<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Generated;

use \Osf\View\AbstractStaticHelper;

/**
 * Static helpers (quick access)
 *
 * @version 1.0
 * @author Guillaume Ponçon - OpenStates Framework PHP Generator
 * @since OSF 2.0
 * @package osf
 * @subpackage generated
 */
abstract class StaticGeneratedViewHelper extends AbstractStaticHelper
{

    /**
     * @return string
     */
    public static function baseUrl($uri = '', $withHost = false)
    {
        return self::callHelper('baseUrl', [$uri, $withHost]);
    }

    /**
     * @return string
     */
    public static function footTags()
    {
        return self::callHelper('footTags', []);
    }

    /**
     * @return string
     */
    public static function headTags()
    {
        return self::callHelper('headTags', []);
    }

    /**
     * @return \Osf\View\Helper\Html
     */
    public static function html($content, $elt = null, array $attributes = array(), $escape = true)
    {
        return self::callHelper('html', [$content, $elt, $attributes, $escape]);
    }

    /**
     * @return \Osf\View\Helper\HtmlList
     */
    public static function htmlList($type = null)
    {
        return self::callHelper('htmlList', [$type]);
    }

    /**
     * @return \Osf\View\Helper\Link
     */
    public static function link($label, $controller = null, $action = null, array $params = array(), array $attributes = array(), $htmlElement = 'a', array $cssClasses = array())
    {
        return self::callHelper('link', [$label, $controller, $action, $params, $attributes, $htmlElement, $cssClasses]);
    }

    /**
     * @return string
     */
    public static function menuBar($items, $color = 'trans')
    {
        return self::callHelper('menuBar', [$items, $color]);
    }

    /**
     * @return \Osf\View\Helper\Script
     */
    public static function script()
    {
        return self::callHelper('script', []);
    }

    /**
     * @return string
     */
    public static function url($controller = null, $action = null, array $params = null, $transferParamKeys = null)
    {
        return self::callHelper('url', [$controller, $action, $params, $transferParamKeys]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Accordion
     */
    public static function accordion($status = null)
    {
        return self::callHelper('accordion', [$status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Alert
     */
    public static function alert($title = null, $content = null, $status = null, $icon = null)
    {
        return self::callHelper('alert', [$title, $content, $status, $icon]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Msg
     */
    public static function bigMsg($content = null, $subContent = null, $status = 'info')
    {
        return self::callHelper('bigMsg', [$content, $subContent, $status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Box
     */
    public static function box($title, $content = null, $badge = null, $coloredTitleBox = false, $collapsable = false, $expandable = false, $removable = false)
    {
        return self::callHelper('box', [$title, $content, $badge, $coloredTitleBox, $collapsable, $expandable, $removable]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Breadcrumb
     */
    public static function breadcrumb()
    {
        return self::callHelper('breadcrumb', []);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Button
     */
    public static function button($label = null, $url = null, $status = null, $icon = null, $block = false, $disabled = false, $flat = false, $size = null)
    {
        return self::callHelper('button', [$label, $url, $status, $icon, $block, $disabled, $flat, $size]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\ButtonGroup
     */
    public static function buttonGroup(array $buttons = array(), $vertical = false)
    {
        return self::callHelper('buttonGroup', [$buttons, $vertical]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Callout
     */
    public static function callout($title = null, $content = null, $status = null)
    {
        return self::callHelper('callout', [$title, $content, $status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Grid
     */
    public static function grid($namespace = null)
    {
        return self::callHelper('grid', [$namespace]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Box
     */
    public static function help($helpFileBaseName, $controller = 'info')
    {
        return self::callHelper('help', [$helpFileBaseName, $controller]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Icon
     */
    public static function icon($icon = null, $status = null, $iconColor = null, $animated = false)
    {
        return self::callHelper('icon', [$icon, $status, $iconColor, $animated]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\InfoBox
     */
    public static function infoBox($title, $value, $icon = null, $color = null, $percentage = null, $progressDescription = null)
    {
        return self::callHelper('infoBox', [$title, $value, $icon, $color, $percentage, $progressDescription]);
    }

    /**
     * @return bool
     */
    public static function isAjax($ai = null)
    {
        return self::callHelper('isAjax', [$ai]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\LinkApp
     */
    public static function linkApp($label, $controller = null, $action = null, array $params = array(), array $attributes = array(), $htmlElement = 'a', array $cssClasses = array())
    {
        return self::callHelper('linkApp', [$label, $controller, $action, $params, $attributes, $htmlElement, $cssClasses]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\ListGroup
     */
    public static function listGroup()
    {
        return self::callHelper('listGroup', []);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Load
     */
    public static function load($url = null, $icon = null)
    {
        return self::callHelper('load', [$url, $icon]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Markdown
     */
    public static function markdown($separator = null)
    {
        return self::callHelper('markdown', [$separator]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Modal
     */
    public static function modal($id, $title = null, $content = null, $footer = null, $status = null)
    {
        return self::callHelper('modal', [$id, $title, $content, $footer, $status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\ModalLink
     */
    public static function modalLink($label, $modalId, array $attributes = array(), $htmlElement = 'a', $escapeLabel = true)
    {
        return self::callHelper('modalLink', [$label, $modalId, $attributes, $htmlElement, $escapeLabel]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Msg
     */
    public static function msg($content, $status = 'info')
    {
        return self::callHelper('msg', [$content, $status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Nav
     */
    public static function nav($stacked = false, $justified = false, $activeAutoDected = true)
    {
        return self::callHelper('nav', [$stacked, $justified, $activeAutoDected]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Panel
     */
    public static function panel($title = null, $content = null, $footer = null, $status = null)
    {
        return self::callHelper('panel', [$title, $content, $footer, $status]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\SmallBox
     */
    public static function smallBox($titleOrValue, $subTitle, $icon = null, $color = null, $linkLabel = null, $linkUrl = null, $linkIcon = 'fa-arrow-circle-right')
    {
        return self::callHelper('smallBox', [$titleOrValue, $subTitle, $icon, $color, $linkLabel, $linkUrl, $linkIcon]);
    }

    /**
     * @return \Osf\View\Helper\Bootstrap\Table
     */
    public static function table($data = null)
    {
        return self::callHelper('table', [$data]);
    }

    /**
     * @return \Osf\Form\Helper\Form
     */
    public static function form(\Osf\Form\AbstractForm $form)
    {
        return self::callHelper('form', [$form]);
    }

    /**
     * @return string
     */
    public static function formCheckbox(\Osf\Form\Element\ElementCheckbox $element)
    {
        return self::callHelper('formCheckbox', [$element]);
    }

    /**
     * @return string
     */
    public static function formCheckboxes(\Osf\Form\Element\ElementCheckboxes $element)
    {
        return self::callHelper('formCheckboxes', [$element]);
    }

    /**
     * @return \Osf\Form\Helper\FormFile
     */
    public static function formFile(\Osf\Form\Element\ElementFile $element)
    {
        return self::callHelper('formFile', [$element]);
    }

    /**
     * @return string
     */
    public static function formHidden(\Osf\Form\Element\ElementHidden $element)
    {
        return self::callHelper('formHidden', [$element]);
    }

    /**
     * @return \Osf\Form\Helper\FormInput
     */
    public static function formInput(\Osf\Form\Element\ElementInput $element)
    {
        return self::callHelper('formInput', [$element]);
    }

    /**
     * @return string
     */
    public static function formRadios(\Osf\Form\Element\ElementRadios $element)
    {
        return self::callHelper('formRadios', [$element]);
    }

    /**
     * @return string
     */
    public static function formReset(\Osf\Form\Element\ElementReset $element)
    {
        return self::callHelper('formReset', [$element]);
    }

    /**
     * @return \Osf\Form\Helper\FormSelect
     */
    public static function formSelect(\Osf\Form\Element\ElementSelect $element)
    {
        return self::callHelper('formSelect', [$element]);
    }

    /**
     * @return string
     */
    public static function formSubmit(\Osf\Form\Element\ElementSubmit $element)
    {
        return self::callHelper('formSubmit', [$element]);
    }

    /**
     * @return string
     */
    public static function formTags(\Osf\Form\Element\ElementInput $element)
    {
        return self::callHelper('formTags', [$element]);
    }

    /**
     * @return string
     */
    public static function formTextarea(\Osf\Form\Element\ElementTextarea $element)
    {
        return self::callHelper('formTextarea', [$element]);
    }

    /**
     * @return string
     */
    public static function formWithDecorators(\Osf\Form\AbstractForm $form)
    {
        return self::callHelper('formWithDecorators', [$form]);
    }

    /**
     * @return string
     */
    public static function label($label = null, $for = null, array $attributes = array())
    {
        return self::callHelper('label', [$label, $for, $attributes]);
    }

}
