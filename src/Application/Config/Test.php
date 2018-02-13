<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Application\Config;

use Osf\Application\Config;
use Osf\Test\Runner as OsfTest;

/**
 * Config manager unit tests
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 14 sept. 2013
 * @package osf
 * @subpackage application
 */
class Test extends OsfTest
{
    public static function run()
    {
        self::reset();

        $config = new Config();
        self::assert($config instanceof Config, 'Bad object type');
        self::assert($config->getConfig() == [], 'Config not empty');
        
        $config->appendConfig(['a' => 1, 'b' => 2, 'c' => [3, 4]]);
        self::assert(count($config->getConfig()) == 3, 'Config values count not correct');
        
        $config->appendConfig(['b' => 5, 'c' => [6, 7]]);
        self::assert($config->getConfig('a') == 1);
        self::assert($config->getConfig('b') == 5);
        self::assert($config->getConfig('c') == [6, 7]);
        
        return self::getResult();
    }
}
