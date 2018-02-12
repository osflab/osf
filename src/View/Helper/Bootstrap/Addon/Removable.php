<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Bootstrap\Addon;

/**
 * Removable element
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
trait Removable
{
    protected $removable = false;
    
    /**
     * Removable element
     * @param bool $trueOrFalse
     * @return $this
     */
    public function removable($trueOrFalse = true)
    {
        $this->removable = (bool) $trueOrFalse;
        return $this;
    }
    
    public function initRemovable(array $vars)
    {
        $this->removable(array_key_exists('removable', $vars) ? $vars['removable'] : false);
    }
}
