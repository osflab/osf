<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Cache;

use Osf\Test\Runner as OsfTest;

/**
 * Cache component unit test
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 */
class Test extends OsfTest
{
    public static function run()
    {
        self::reset();
        
        $key = 'TEST::a_key';
        $cache = new OsfCache('osftest');
        self::assert(is_int($cache->cleanAll()));
        self::assert(is_int($cache->clean($key)));
        self::assertEqual($cache->get($key), false);
        self::assert($cache->set($key, null));
        self::assertEqual($cache->get($key), null);
        self::assert($cache->set($key, 'welcome'));
        self::assertEqual($cache->get($key), 'welcome');
        self::assertEqual($cache->cleanAll(), 1);
        self::assertEqual($cache->get($key), false);
        self::assert($cache->getRedis() instanceof \Redis);
        
        return self::getResult();
    }
}
