<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Helper;

use Osf\Form\Element\ElementInput;

/**
 * Text input element
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2013
 * @version 1.0
 * @since OSF-2.0 - 6 déc. 2013
 * @package osf
 * @subpackage form
 */
class FormTags extends FormInput
{
    /**
     * @param ElementInput $element
     * @return string
     */
    public function __invoke(ElementInput $element) {
        return $this->buildStandardElement($element, ['type' => 'text']);
    }
}
