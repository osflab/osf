<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Element;

use \Osf\View\Helper\Bootstrap\Addon\Status;

/**
 * Reset element
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2013
 * @version 1.0
 * @since OSF-2.0 - 6 déc. 2013
 * @package osf
 * @subpackage form
 */
class ElementReset extends ElementAbstract
{
    use Status;
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function __toString() {
        $this->status || $this->statusDefault();
        return parent::__toString();
    }
}
