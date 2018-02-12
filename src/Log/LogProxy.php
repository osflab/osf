<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Log;

use Osf\Log\AdapterInterface;
use Osf\Exception\ArchException;
use Osf\Stream\Text;

/**
 * Simple log manager
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage log
 * @task [LOG] get adapters from sma app + tests
 */
class LogProxy
{
    const LEVEL_INFO    = 'info';
    const LEVEL_WARNING = 'warning';
    const LEVEL_ERROR   = 'error';
    
    protected static $adapter;
    
    /**
     * Set an adapter for log
     * @param AdapterInterface $adapter
     */
    public static function setAdapter(AdapterInterface $adapter)
    {
        self::$adapter = $adapter;
    }
    
    /**
     * @return AdapterInterface
     * @throws ArchException
     */
    public static function getAdapter(): AdapterInterface
    {
        if (!self::$adapter) {
            throw new ArchException('No adapter defined for logging');
        }
        return self::$adapter;
    }
    
    /**
     * Save un log
     * @param string $message
     * @param string $level
     * @param string|null $category
     * @param mixed $dump
     * @return mixed
     */
    public static function log(string $message, string $level = self::LEVEL_INFO, ?string $category = null, $dump = null)
    {
        $message = Text::crop($message, 255);
        return static::getAdapter()->log($message, $level, $category, $dump);
    }
    
    /**
     * Information message
     * @param string $message
     * @param string|null $category
     * @param mixed $dump
     * @return mixed
     */
    public static function info(string $message, ?string $category = null, $dump = null)
    {
        return self::log($message, self::LEVEL_INFO, $category, $dump);
    }
    
    /**
     * Warning message
     * @param string $message
     * @param string|null $category
     * @param mixed $dump
     * @return mixed
     */
    public static function warning(string $message, ?string $category = null, $dump = null)
    {
        return self::log($message, self::LEVEL_WARNING, $category, $dump);
    }
    
    /**
     * Error message
     * @param string $message
     * @param string|null $category
     * @param mixed $dump
     * @return mixed
     */
    public static function error(string $message, ?string $category = null, $dump = null)
    {
        return self::log($message, self::LEVEL_ERROR, $category, $dump);
    }
    
    /**
     * Hacking detection
     * @param string $message
     * @param mixed $dump
     * @return mixed
     */
    public static function hack(string $message, $dump = null)
    {
        return self::log($message, self::LEVEL_ERROR, 'HACK', $dump);
    }
}
