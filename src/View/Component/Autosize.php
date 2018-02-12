<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Component;

use Osf\View\Component;

/**
 * Autosize component (textarea)
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 * @link http://www.jacklmoore.com/autosize/ Usage & options
 */
class Autosize extends AbstractComponent
{
    public function __construct()
    {
        if (Component::registerComponentScripts()) {
            $this->registerFootJs('/js/autosize.min.js', true);
        }
        $this->registerScript("autosize($('textarea'));");
    }
}
