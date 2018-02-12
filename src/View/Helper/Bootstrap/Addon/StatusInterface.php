<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Bootstrap\Addon;

/**
 * Bootstrap status constants
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
interface StatusInterface extends IconInterface, ColorInterface
{
    const STATUS_DEFAULT = 'default';
    const STATUS_PRIMARY = 'primary';
    const STATUS_SUCCESS = 'success';
    const STATUS_INFO    = 'info';
    const STATUS_WARNING = 'warning';
    const STATUS_DANGER  = 'danger';
    
    const STATUS_ERROR   = self::STATUS_DANGER;
    const STATUS_ONLINE  = self::STATUS_SUCCESS;
    const STATUS_OFFLINE = self::STATUS_DANGER;
    
    const STATUS_LIST = [
        self::STATUS_DEFAULT,
        self::STATUS_PRIMARY,
        self::STATUS_SUCCESS,
        self::STATUS_INFO,
        self::STATUS_WARNING,
        self::STATUS_DANGER
    ];
    const STATUS_COLOR_LIST = [
        self::STATUS_DEFAULT => self::COLOR_GRAY,
        self::STATUS_PRIMARY => self::COLOR_BLUE,
        self::STATUS_INFO    => self::COLOR_AQUA,
        self::STATUS_SUCCESS => self::COLOR_GREEN,
        self::STATUS_WARNING => self::COLOR_YELLOW,
        self::STATUS_ERROR   => self::COLOR_RED
    ];
    const STATUS_ICONS = [
        self::STATUS_PRIMARY => self::ICON_CIRCLE,
        self::STATUS_DEFAULT => self::ICON_REMARK,
        self::STATUS_INFO    => self::ICON_INFO,
        self::STATUS_SUCCESS => self::ICON_SUCCESS,
        self::STATUS_WARNING => self::ICON_WARNING,
        self::STATUS_DANGER  => self::ICON_ERROR
    ];

}
