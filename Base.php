<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Console;

/**
 * Console base helpers
 * 
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 11 sept. 2013
 * @package osf
 * @subpackage controller
 */
class Base
{
    protected const COLOR_BEGIN_RED    = '[1;31m';
    protected const COLOR_BEGIN_GREEN  = '[1;32m';
    protected const COLOR_BEGIN_YELLOW = '[1;33m';
    protected const COLOR_BEGIN_BLUE   = '[1;34m';
    protected const COLOR_END          = '[0;0m';

    /**
     * New action message, need to be ended by a "endActionXxx" method
     * @param string $message
     * @param int $lineLen
     * @return string
     */
    public static function beginActionMessage(string $message, int $lineLen = 80): string
    {
        return sprintf("- " . self::blue() . "%'.-" . ($lineLen - 11) . "s" . self::resetColor(), $message . ' ');
    }

    /**
     * The action fails
     * @return string
     */
    public static function endActionFail(): string
    {
        return ' [' . self::red() . 'FAILED' . self::resetColor() . "]\n";
    }

    /**
     * Success
     * @return string
     */
    public static function endActionOK(): string
    {
        return ' [' . self::green() . '  OK  ' . self::resetColor() . "]\n";
    }

    /**
     * Skipped
     * @return string
     */
    public static function endActionSkip(): string
    {
        return ' [' . self::yellow() . ' SKIP ' . self::resetColor() . "]\n";
    }
    
    /**
     * Change current color
     * @param string $colorPrefix
     * @return string
     */
    public static function color(string $colorPrefix): string
    {
        return chr(033) . $colorPrefix;
    }
    
    /**
     * Change to red color
     * @return string
     */
    public static function red(): string
    {
        return self::color(self::COLOR_BEGIN_RED);
    }
    
    /**
     * Change to green color
     * @return string
     */
    public static function green(): string
    {
        return self::color(self::COLOR_BEGIN_GREEN);
    }

    /**
     * Change to yellow color
     * @return string
     */
    public static function yellow(): string
    {
        return self::color(self::COLOR_BEGIN_YELLOW);
    }

    /**
     * Change to blue color
     * @return string
     */
    public static function blue(): string
    {
        return self::color(self::COLOR_BEGIN_BLUE);
    }
    
    /**
     * Reset current color
     * @return string
     */
    public static function resetColor(): string
    {
        return self::color(self::COLOR_END);
    }
    
    /**
     * Is it a command line context ?
     * @return bool
     */
    public static function isCli(): bool
    {
        return isset($_SERVER['argc']) && $_SERVER['argc'];
    }
}
