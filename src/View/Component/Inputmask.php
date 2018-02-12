<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Component;

use Osf\View\Component;
use Osf\Stream\Json;

/**
 * Inputmask component
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 * @link http://robinherbots.github.io/Inputmask/ Usage & options
 * @link https://github.com/RobinHerbots/Inputmask sources & doc
 */
class Inputmask extends AbstractComponent
{
    const MASK_PHONE_FR = "09 99 99 99 99";
    const MASK_DATE = '99/99/9999';
    const MASK_TIME = '99:99';
    
    public function __construct()
    {
        if (Component::registerComponentScripts()) {
            $this->registerFootJs('/js/jquery.inputmask.bundle.min.js', true);
        }
    }
    
    public function registerMask($elementId, $mask, array $options = null)
    {
        $opt = $options === null ? '' : ', ' . Json::encode($options, false);
        $this->registerScript('$(\'#' . $elementId . '\').inputmask("' . $mask . '"' . $opt . ');');
    }
}
