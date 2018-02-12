<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Cache;

use Osf\Container\VendorContainer;
use Osf\Cache\RedisResourceManager;
use Zend\Cache\Storage\Adapter\Redis as RedisAdapter;
use Zend\Cache\Storage\Adapter\RedisOptions;
use Osf\Container\OsfContainer as Container;
use Redis;

/**
 * Simple and fast cache using Redis
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 24 sept. 2013
 * @package osf
 * @subpackage cache
 */
class OsfCache
{
    const DEFAULT_NAMESPACE = 'osfcache';
    const NSKSEP = ':';
    const DEV_NOCACHE = false;
    
    protected $lastKey = null;
    protected $redis = null;
    protected $namespace;
    
    public function __construct(string $namespace = self::DEFAULT_NAMESPACE, \Redis $redis = null)
    {
        $this->namespace = $namespace;
        $this->redis = $redis;
    }
    
    /**
     * @return \Redis
     */
    public function getRedis(): Redis
    {
        if ($this->redis === null) {
            if (class_exists('\Osf\Container\VendorContainer')) {
                $this->redis = VendorContainer::getRedis();
            } else {
                $this->redis = new \Redis();
                $this->redis->pconnect('127.0.0.1', 6379);
                $this->redis->setOption(Redis::OPT_SERIALIZER, 
                        defined('Redis::SERIALIZER_IGBINARY')
                        ? Redis::SERIALIZER_IGBINARY
                        : Redis::SERIALIZER_PHP);
            }
        }
        return $this->redis;
    }
    
    /**
     * @param string $key
     * @param type $value
     * @param float $timeout
     * @return $this
     */
    public function set(string $key, $value, int $timeout = null)
    {
        if ($this->noCache()) { return $this; }
        $key = $this->namespace . self::NSKSEP . $key;
        $result = $timeout === null ?
            $this->getRedis()->set($key, $value) : 
            $this->getRedis()->set($key, $value, $timeout);
        if (!$result) {
            trigger_error('Unable to set in redis cache: ' . $this->getRedis()->getLastError());
        }
        return $this;
    }
    
    /**
     * @param string $key
     * @return string  The value, if the command executed successfully BOOL FALSE in case
     */
    public function get(string $key)
    {
        return $this->noCache() ? null : $this->getRedis()->get($this->namespace . self::NSKSEP . $key);
    }
    
    /**
     * @param string $key
     * @return $this
     */
    public function start(string $key):self
    {
        $value = $this->get($this->namespace . self::NSKSEP . $key);
        if ($value === null) {
            $this->lastKey = $this->namespace . self::NSKSEP . $key;
            ob_start();
        } else {
            $this->lastKey = null;
            trigger_error('Cache start failed');
        }
        return $this;
    }
    
    /**
     * @param float $timeout
     * @return $this
     */
    public function stop(float $timeout = 0.0): self
    {
        if ($this->lastKey !== null) {
            $this->set($this->lastKey, ob_get_clean(), $timeout);
        }
        $this->lastKey = null;
        return $this;
    }
    
    /**
     * @return int Number of deleted fields
     */
    public function cleanAll(): int
    {
        $cpt = 0;
        $keys = $this->getRedis()->keys($this->namespace . ':*');
        if ($keys) {
            foreach ($keys as $key) {
                $this->getRedis()->del($key);
                $cpt++;
            }
        }
        return $cpt;
    }
    
    /**
     * @param string $key
     * @return int Number of deleted fields
     */
    public function clean(string $key): int
    {
        return $this->getRedis()->del($this->namespace . self::NSKSEP . $key);
    }
    
    /**
     * Build and return a zend cache storage using OSF cache configuration
     * @staticvar array $storages
     * @param string $namespace
     * @return \Zend\Cache\Storage\Adapter\Redis
     */
    public function getZendStorage(string $namespace = 'default')
    {
        static $storages = [];
        
        if (!isset($storages[$namespace])) {
            $rrm = new RedisResourceManager();
            $rrm->setResource('default', $this->getRedis());
            $options = new RedisOptions();
            $options->setResourceManager($rrm);
            $storages[$namespace] = new RedisAdapter($options);
        }
        return $storages[$namespace];
    }
    
    /**
     * No cache detection
     * @return bool
     */
    protected function noCache()
    {
        return self::DEV_NOCACHE && Container::getApplication()->isDevelopment();
    }
}
