<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Tags;

/**
 * Meta head tags
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 13 déc. 2013
 * @package osf
 * @subpackage view
 */
trait Meta
{
    protected $meta = array();
    
    public function buildMeta()
    {
        if (count($this->meta)) {
            return implode("\n", $this->meta) . "\n";
        }
        return '';
    }
}
