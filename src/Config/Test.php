<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Config;

use Osf\Config\OsfConfig as Config;
use Osf\Stream\Yaml;
use Osf\Test\Runner as TestRunner;

/**
 * Config unit test
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 */
class Test extends TestRunner
{
    public static function run()
    {
        self::reset();
        
        $config = new Config();
        self::assertEqual($config->getValues(), []);
        $config->appendConfig(Yaml::parseFile(__DIR__ . '/test.yml'));
        $form = $config->getForm();
        self::assertEqual(implode(',', array_keys($form->getSubForms())), 'product,user,cosmetics');
        self::assertEqual($config->getValues()['product']['currency'], 'EUR');
        self::assertEqual($config->getValues()['user']['isbn'], null);
        
        return self::getResult();
    }
}
