<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Exception;

use Osf\Error;
use Osf\Application;
use Osf\Log;
use Osf\Container;

/**
 * Exception from error handler
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 */
class ErrorException extends \Exception
{
    public static function startHandler()
    {
        set_error_handler(function ($severity, $msg, $file, $line, array $context)
        {
            if (0 === error_reporting()) {
                return false;
            }
            $message = $msg . ' at ' . $file . '(' . $line . ')';
            switch($severity)
            {
                case E_ERROR:               $e = new ErrorException            ($message); break;
                case E_WARNING:             $e = new WarningException          ($message); break;
                case E_PARSE:               $e = new ParseException            ($message); break;
                case E_NOTICE:              $e = new NoticeException           ($message); break;
                case E_CORE_ERROR:          $e = new CoreErrorException        ($message); break;
                case E_CORE_WARNING:        $e = new CoreWarningException      ($message); break;
                case E_COMPILE_ERROR:       $e = new CompileErrorException     ($message); break;
                case E_COMPILE_WARNING:     $e = new CoreWarningException      ($message); break;
                case E_USER_ERROR:          $e = new UserErrorException        ($message); break;
                case E_USER_WARNING:        $e = new UserWarningException      ($message); break;
                case E_USER_NOTICE:         $e = new UserNoticeException       ($message); break;
                case E_STRICT:              $e = new StrictException           ($message); break;
                case E_RECOVERABLE_ERROR:   $e = new RecoverableErrorException ($message); break;
                case E_DEPRECATED:          $e = new DeprecatedException       ($message); break;
                case E_USER_DEPRECATED:     $e = new UserDeprecatedException   ($message); break;
            }
            $msg = get_class($e) . ' : ' . $e->getMessage();
            try { Log::error($msg, 'PHPERR', $e->getTraceAsString()); } catch (\Exception $e) {
                file_put_contents(sys_get_temp_dir() . '/undisplayed-sma-errors.log', date('Ymd-His-') . $e->getMessage(), FILE_APPEND);
            }
            if (Application::isDevelopment()) {
                Error::displayException($e);
            } else {
                if (Application::isStaging()) {
                    $err = sprintf(__("%s. Détails dans les logs."), $e->getMessage());
                    echo Container::getViewHelper()->alert(__("Erreur détectée"), $err)->statusWarning();
                }
            }
        });
    }
}

class WarningException              extends ErrorException {}
class ParseException                extends ErrorException {}
class NoticeException               extends ErrorException {}
class CoreErrorException            extends ErrorException {}
class CoreWarningException          extends ErrorException {}
class CompileErrorException         extends ErrorException {}
class CompileWarningException       extends ErrorException {}
class UserErrorException            extends ErrorException {}
class UserWarningException          extends ErrorException {}
class UserNoticeException           extends ErrorException {}
class StrictException               extends ErrorException {}
class RecoverableErrorException     extends ErrorException {}
class DeprecatedException           extends ErrorException {}
class UserDeprecatedException       extends ErrorException {}
