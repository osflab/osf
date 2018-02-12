<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Component;

use Osf\View\Component;

/**
 * Jquery datepicker (text)
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 */
class Colorpicker extends AbstractComponent implements PickerInterface
{
    public function __construct()
    {
        if (Component::registerComponentScripts()) {
            $this->registerHeadCss('/plugins/colorpicker/bootstrap-colorpicker.min.css', true);
            $this->registerFootJs('/plugins/colorpicker/bootstrap-colorpicker.min.js', true);
        }
    }
    
    /**
     * Attach a javascript launcher to the element id
     * @param string $elementId
     * @return $this
     */
    public function registerElementId(string $elementId)
    {
        $this->registerScript('$(\'#' . $elementId . '\').colorpicker();');
        return $this;
    }
}
