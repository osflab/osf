<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Filter;

use Osf\Filter\Telephone;

/**
 * Filters unit tests
 * 
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage test
 */
class Test extends \Osf\Test\Runner
{
    public static function run()
    {
        self::reset();
        
        $tel = new Telephone();
       
        self::assertEqual($tel->filter('0123456789'), '0123456789');
        self::assertEqual($tel->filter('012345678'), '012345678');
        self::assertEqual($tel->filter('01234567'), '01234567');
        self::assertEqual($tel->filter('0123456'), '0123456');
        
        self::assertEqual($tel->filter('0 1 2 34 56 7 8 9'), '0123456789');
        self::assertEqual($tel->filter('   0123  45678'), '012345678');
        self::assertEqual($tel->filter('012345  67'), '01234567');
        self::assertEqual($tel->filter('+ 01234  56ab'), '+0123456ab');
        
        self::assertEqual($tel->filter('+33123456789'), '+33123456789');
        self::assertEqual($tel->filter('+33(1)23456789'), '+33(1)23456789');
        self::assertEqual($tel->filter('+33123456789'), '+33123456789');
        self::assertEqual($tel->filter('+ 33  (1 ) 234  5 6 7 89'), '+33(1)23456789');
        
        return self::getResult();
    }
}
