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
        self::assert($cache->getRedis() instanceof \Redis);
        self::assert(is_int($cache->cleanAll()));
        self::assert(is_int($cache->clean($key)));
        self::assertEqual($cache->get($key, false), false);
        self::assert($cache->set($key, null));
        self::assertEqual($cache->get($key), null);
        self::assert($cache->set($key, 'welcome'));
        self::assertEqual($cache->get($key), 'welcome');
        self::assertEqual($cache->cleanAll(), 1);
        self::assertEqual($cache->get($key), null);
        self::assertEqual($cache->get($key, ['default']), ['default']);
        self::assertEqual($cache->set($key, ['a' => 'b', 'c' => 'd'], new \DateInterval('PT2S')), true);
        self::assertEqual($cache->get($key, false), ['a' => 'b', 'c' => 'd']);
        self::assertEqual($cache->has($key), true);
        self::assertEqual($cache->delete($key), true);
        self::assertEqual($cache->get($key, false), false);
        
        $values = ['A1' => ['a' => 4], 'A2' => new \stdClass(), 'B' => true];
        self::assertEqual($cache->setMultiple($values, 2), true);
        self::assertEqual($cache->getMultiple(array_keys($values)), $values, false);
        self::assertEqual($cache->get('A2'), new \stdClass(), false);
        self::assertEqual($cache->get('A1'), ['a' => 4]);
        
        $values['B1'] = false;
        self::assertEqual($cache->getMultiple(array_keys($values)), $values, false);
        self::assertEqual($cache->delete('UNK'), false);
        self::assertEqual($cache->delete('A1'), true);
        self::assertEqual($cache->get('A1'), null);
        self::assertEqual($cache->clear(), true);
        self::assertEqual($cache->get('B'), null);
        
        return self::getResult();
    }
}
