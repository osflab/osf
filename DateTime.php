<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Helper;

use Osf\Stream\Text;
use DateTime as DT;

/**
 * Date and time tools
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage helper
 */
class DateTime
{
    public static function buildDate($value): DT
    {
        switch (true) {
            case $value === null : 
                return new DT();
            case $value instanceof DT : 
                return $value;
            case is_string($value) : 
                $date = new DT();
                $value = str_replace('#([0-9]{2})/([0-9]{2})/([0-9]{4})#', '$3-$2-$1', $value);
                $date->setTimestamp(strtotime(str_replace('/', '-', $value)));
                return $date;
            case is_int($value) : 
                $date = new DT();
                $date->setTimestamp($value);
                return $date;
            default : 
                throw new ArchException('Unknown date format');
        }
    }
    
    public static function formatDate(DT $date, $locale = 'fr')
    {
        return Text::formatDate($date, $locale);
    }
    
    /**
     * Compare with today and return a color (too late, today, on time)
     * @param DT $date
     * @param string $colorBefore
     * @param string $colorToday
     * @param string $colorAfter
     * @return string
     */
    public static function getDateColor(DT $date, string $colorBefore = 'orange', string $colorToday = 'blue', string $colorAfter = 'green')
    {
        $time = time();
        if ($date->format('dmY') == date('dmY', $time)) {
            return $colorToday;
        }
        return $date->getTimestamp() > $time ? $colorAfter : $colorBefore;
    }
    
    /**
     * Calculate the day of the end of the month, get the timestamp
     * @param int $timestamp
     * @return int
     */
    public static function getLastDayOf(int $timestamp): int
    {
        $month = date('F Y', $timestamp);
        return strtotime('last day of ' . $month);
    }
}
