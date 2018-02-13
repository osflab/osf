<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */


namespace Osf\Controller {

    use Osf\Console\ConsoleHelper as ConsoleBase;
    use Osf\Application\OsfApplication as Application;
    use Osf\Generator\DbGenerator;
    use Osf\Generator\ZendGenerator;
    use Osf\Generator\OsfGenerator;
    use Osf\Container\ZendContainer;
    use Osf\Stream\Text as T;
    use Osf\Test\Runner as OsfTest;

    /**
     * Command line controller
     * 
     * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
     * @copyright OpenStates
     * @version 1.0
     * @since OSF-2.0 - 11 sept. 2013
     * @package osf
     * @subpackage controller
     */
    class Cli extends ConsoleBase
    {
        const MAX_LOAD_AVERAGE = 2;
        protected static $configFile      = null; 
        protected static $databases       = null;
        protected static $generators      = [];
        protected static $deferredActions = [];

        /**
         * Bootstrap of the controller
         */
        public static function run()
        {
            if ($_SERVER['argc'] < 2) {
                self::helpAction();
                exit();
            }
            $method = $_SERVER['argv'][1] . 'Action';
            if (method_exists(static::getCurrentClass(), $method)) {
                $params = $_SERVER['argv'];
                array_shift($params);
                array_shift($params);
                call_user_func_array(array(static::getCurrentClass(), $method), $params);
            } else {
                self::displayError("command unknown", true);
            }
        }

        /**
         * Display an error.
         * @param string $errorMessage the error message to display
         * @param boolean $displayHelp display the help message (helpAction)
         * @param boolean $exit exit after displaying
         */
        protected static function displayError($errorMessage, $displayHelp = false, $exit = true)
        {
            echo "\n  " . self::red() . 'Error: ' . self::resetColor() . $errorMessage . "\n";
            if ($displayHelp) {
                self::helpAction();
            } else {
                echo "\n";
            }
            if ($exit) {
                exit();
            }
        }

        /**
         * Display a message
         * @param string $message
         */
        protected static function display($message = null)
        {
            if ($message != null) {
                echo '-> ' . $message;
            }
            echo "\n";
        }

        /**
         * Copy this function in classes extended classes
         * @return string
         */
        protected static function getCurrentClass()
        {
            return __CLASS__;
        }

        /**
         * Run unit tests of the application.
         */
        protected static function testAction()
        {
            $args = func_get_args();
            $rootPath = self::getRootPath($args);
            self::display("Running tests in " . $rootPath);
            set_include_path($rootPath . ':' . get_include_path());
            OsfTest::runDirectory($rootPath);
        }

        /**
         * Execute deferred actions (log register, cache generation...)
         */
        protected static function tickAction()
        {
            $load = sys_getloadavg();
            if ($load[0] >= self::MAX_LOAD_AVERAGE) {
                $percent = T::percentageFormat($load[0] * 100);
                self::display('Load average too high to execute deferred actions (' . $percent . ')');
                return;
            }
            if (!self::$deferredActions) {
                self::display('No deferred action');
                return;
            }
            foreach (self::$deferredActions as $class) {
                $action = new $class();
                if (!($action instanceof Cli\DeferredActionInterface)) {
                    self::displayError($action . ' is not a deferred action class');
                    continue;
                }
                echo self::beginActionMessage($action->getName());
                switch ($action->execute()) {
                    case true  : echo self::endActionOK();   break;
                    case null  : echo self::endActionSkip(); break;
                    default    : echo self::endActionFail();
                }
                foreach ($action->getMessages() as $msg) {
                    self::display($msg);
                }
                foreach ($action->getErrors() as $msg) {
                    self::displayError($msg);
                }
            }
        }

        /**
         * Display this message
         */
        protected static function helpAction()
        {
            $class = new \ReflectionClass(static::getCurrentClass());
            $methods = $class->getMethods();
            $commands = array();
            $comments = array();
            $commandLen = 0;
            foreach ($methods as $method) {
                $methodName = (string) $method->getName();
                if (substr($methodName, -6, 6) == 'Action') {
                    $command = substr($methodName, 0, strlen($methodName) - 6);
                    $comment = preg_replace('#^[^a-zA-Z0-9_.()-]*(.*?)[^a-zA-Z0-9_.()-]*$#', '\1', $method->getDocComment());
                    $commandLen = max(strlen($command), $commandLen);
                    $commands[] = $command;
                    $comments[] = $comment;
                }
            }
            $commandLen++;
            echo "\n  Synopsis: " . self::green() . basename($_SERVER['argv'][0]) . self::yellow() . ' <command>' . self::resetColor() . " [options]\n\n";
            foreach ($commands as $key => $command) {
                printf(self::yellow() . " %' " . $commandLen . 's' . self::resetColor() . ": %s\n", $command, $comments[$key]);
            }
            echo "\n";
        }

        protected static function registerDeferredClass($className)
        {
            self::$deferredActions[] = $className;
        }

        /**
         * Generate DB models, helpers and auto-updatable classes
         */
        protected static function generateAction()
        {
            self::checkOnlyDevEnv();
            $generators = array_merge(['all', 'db', 'osf', 'zend'], static::$generators);
            $args = func_get_args();
            if (!isset($args[0]) || !in_array($args[0], $generators)) {
                self::displayError('specify an item to generate (' . implode('|', $generators) . ')');
            }
            if ($args[0] == 'all') {
                foreach ($generators as $genKey) {
                    if ($genKey == 'all') {
                        continue;
                    }
                    self::lauchGenerator($genKey);
                }
            } else {
                self::lauchGenerator($args[0]);
            }
        }

        protected static function lauchGenerator($genKey)
        {
            $generatorMethod = 'generate' . T::camelCase($genKey);
            if (!method_exists(__CLASS__, $generatorMethod)) {
                self::displayError('Generator [' . $genKey . '] do not exists. Bad generators configuration.');
            }
            return self::$generatorMethod();
        }

        protected static function generateDb()
        {
            if (static::$configFile) {
                \Osf\Container\OsfContainer::getConfig()->appendConfig(include static::$configFile);
            }

            if (!isset(static::$databases[0])) {
                echo self::beginActionMessage('Databases generator: no database configured');
                echo self::endActionSkip();
                return;
            }

            foreach (static::$databases as $db) {
                echo self::beginActionMessage('Database models generation: ' . $db['comment']);
                try {
                    (new DbGenerator(ZendContainer::getDbAdapterFromKey($db['adapter']), $db['generatorParams']))->generateClasses();
                } catch (\Exception $e) {
                    echo self::endActionFail();
                    self::displayError($e->getMessage());
                }
                echo self::endActionOK();
            }

        }

        protected static function generateZend()
        {
            $zendGenerators = [
                'Filters', 'Validators', 
                'ViewHelpers', 'FormElements'
            ];
            foreach ($zendGenerators as $name) {
                echo self::beginActionMessage('Extractions from ZF: ' . $name);
                try {
                    $method = 'generate' . $name;
                    (new ZendGenerator())->$method();
                } catch (\Exception $e) {
                    echo self::endActionFail();
                    self::displayError($e->getMessage());
                }
                echo self::endActionOK();
            }
        }

        protected static function generateOsf()
        {
            echo self::beginActionMessage('OpenStates Framework Helpers');
            try {
                (new OsfGenerator())->generateAll();
                echo self::endActionOK();
            } catch (\Exception $e) {
                echo self::endActionFail();
                self::displayError($e->getMessage());
            }
        }

        /**
         * Detect the root path of the current framework.
         * @param array $args arguments of the command ligne.
         * @return string
         */
        protected static function getRootPath($args = null)
        {
            static $path = null;

            if (isset($args[0])) {
                $rootPath = (string) $args[0];
            } else {
                if ($path !== null) {
                    return $path;
                }
                if (defined('APP_PATH')) {
                    $rootPath = APP_PATH;
                } else {
                    $rootPath = $_SERVER['PWD'];
                }
                $path = $rootPath;
            }
            return $rootPath;
        }

        /**
         * Check if the zend framework url of the configuration file is OK.
         * @param string $url
         */
        protected static function checkZendFramework($url)
        {
            static $checked = null;

            if ($checked === null) {
                self::display('Testing zend framework access...');
                if (!file_get_contents($url, null, null, null, 10)) {
                    self::displayError('Unable to access Zend Framework libraries from this server !');
                }
                $checked = true;
            }
        }

        /**
         * Display an error and exit if not a development environment
         * @return void
         */
        protected static function checkOnlyDevEnv(): void
        {
            $env = defined('APPLICATION_ENV') ? APPLICATION_ENV : (getenv('APPLICATION_ENV') ?? null);
            if ($env !== Application::ENV_DEV) {
                self::displayError('Use this command only in development environment');
            }
        }
    }
}
namespace {
    if (class_exists('\Osf\Application\Bootstrap')) {
        Osf\Application\Bootstrap::isTranslatorBuilded();
    }
    if (!function_exists('__')) {
        function __($txt) {
            return $txt;
        }
    }
}
