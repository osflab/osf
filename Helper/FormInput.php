<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Helper;

use Osf\Form\Element\ElementInput;
use Osf\Stream\Html;
use Osf\View\Component;
use Osf\View\Helper\Bootstrap\Tools\Checkers;

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
class FormInput extends AbstractFormHelper
{
    use Addon\LeftRight;
    
    public function __construct()
    {
        $this->resetValues();
    }
    
    /**
     * @param ElementInput $element
     * @return \Osf\Form\Helper\FormInput
     */
    public function __invoke(ElementInput $element)
    {
        return $this;
    }
    
    /**
     * @return string
     */
    public function render()
    {
        /* @var $element \Osf\Form\Element\ElementInput */
        $element = $this->getElement();
        
        //$this->resetDecorations();
        $attributes   = ['type' => $element->getType()];
        $cssClasses   = ['form-control'];
        $addOnClasses = ['input-group'];
        $addOnAttrs   = [];
        if ($element->getDataMask()) {
            Component::getInputmask()->registerMask($element->getId(), $element->getDataMask(), $element->getDataMaskOpt());
        }
        $validator = $element->getValidator('Osf\Validator\Zend\ZendValidatorStringLength');
        if ($validator && $validator->getMax()) {
            $attributes['maxlength'] = $validator->getMax();
        }
        if ($element->getRequired()) {
            $attributes['required'] = null;
        }
        switch ($element->getType(false)) {
            case ElementInput::TYPE_PRICE : 
                $attributes['step'] = '.01';
                break;
            case ElementInput::TYPE_FLOAT : 
                $attributes['step'] = 'any';
                break;
        }
        $retVal = $this->buildStandardElement($element, $attributes, $cssClasses);
        switch ($element->getPicker()) {
            case ElementInput::PICKER_DATE : 
                Component::getDatepicker()->registerElementId($element->getId());
                break;
            case ElementInput::PICKER_TIME : 
                Component::getTimepicker()->registerElementId($element->getId());
                $retVal = Html::buildHtmlElement('div', ['class' => 'bootstrap-timepicker'], $retVal);
                break;
            case ElementInput::PICKER_COLOR : 
                $formGroupId = 'fg-' . $element->getId();
                $addOnAttrs['id'] = $formGroupId;
                Component::getColorpicker()->registerElementId($formGroupId);
                if ($element->getAddonLeft() || $element->getAddonRight()) {
                    Checkers::notice('Addons are incompatibles with colorpicker');
                }
                $element->setAddonLeft();
                $element->setAddonRight('<i></i>');
                break;
        }
        $lValue = $this->buildAddonHtml($element->getAddonLeft(), $element->getId());
        $rValue = $this->buildAddonHtml($element->getAddonRight());
        if ($lValue || $rValue) {
            $value = $lValue . $retVal . $rValue;
            $addOnAttrs['class'] = implode(' ', $addOnClasses);
            $retVal = Html::buildHtmlElement('div', $addOnAttrs, $value);
        }
        
        return $retVal;
    }
}
