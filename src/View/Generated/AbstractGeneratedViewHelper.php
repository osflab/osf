<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Generated;

use \Osf\View\AbstractHelper;

/**
 * Osf Helpers builders
 *
 * @version 1.0
 * @author Guillaume Ponçon - OpenStates Framework PHP Generator
 * @since OSF 2.0
 * @package osf
 * @subpackage generated
 * @property \Osf\View\Helper\BaseUrl $baseUrl
 * @property \Osf\View\Helper\FootTags $footTags
 * @property \Osf\View\Helper\HeadTags $headTags
 * @property \Osf\View\Helper\Html $html
 * @property \Osf\View\Helper\HtmlList $htmlList
 * @property \Osf\View\Helper\Link $link
 * @property \Osf\View\Helper\MenuBar $menuBar
 * @property \Osf\View\Helper\Script $script
 * @property \Osf\View\Helper\Url $url
 * @property \Osf\View\Helper\Bootstrap\Accordion $accordion
 * @property \Osf\View\Helper\Bootstrap\Alert $alert
 * @property \Osf\View\Helper\Bootstrap\BigMsg $bigMsg
 * @property \Osf\View\Helper\Bootstrap\Box $box
 * @property \Osf\View\Helper\Bootstrap\Breadcrumb $breadcrumb
 * @property \Osf\View\Helper\Bootstrap\Button $button
 * @property \Osf\View\Helper\Bootstrap\ButtonGroup $buttonGroup
 * @property \Osf\View\Helper\Bootstrap\Callout $callout
 * @property \Osf\View\Helper\Bootstrap\Grid $grid
 * @property \Osf\View\Helper\Bootstrap\Help $help
 * @property \Osf\View\Helper\Bootstrap\Icon $icon
 * @property \Osf\View\Helper\Bootstrap\InfoBox $infoBox
 * @property \Osf\View\Helper\Bootstrap\IsAjax $isAjax
 * @property \Osf\View\Helper\Bootstrap\LinkApp $linkApp
 * @property \Osf\View\Helper\Bootstrap\ListGroup $listGroup
 * @property \Osf\View\Helper\Bootstrap\Load $load
 * @property \Osf\View\Helper\Bootstrap\Markdown $markdown
 * @property \Osf\View\Helper\Bootstrap\Modal $modal
 * @property \Osf\View\Helper\Bootstrap\ModalLink $modalLink
 * @property \Osf\View\Helper\Bootstrap\Msg $msg
 * @property \Osf\View\Helper\Bootstrap\Nav $nav
 * @property \Osf\View\Helper\Bootstrap\Panel $panel
 * @property \Osf\View\Helper\Bootstrap\SmallBox $smallBox
 * @property \Osf\View\Helper\Bootstrap\Table $table
 * @property \Osf\Form\Helper\Form $form
 * @property \Osf\Form\Helper\FormCheckbox $formCheckbox
 * @property \Osf\Form\Helper\FormCheckboxes $formCheckboxes
 * @property \Osf\Form\Helper\FormFile $formFile
 * @property \Osf\Form\Helper\FormHidden $formHidden
 * @property \Osf\Form\Helper\FormInput $formInput
 * @property \Osf\Form\Helper\FormRadios $formRadios
 * @property \Osf\Form\Helper\FormReset $formReset
 * @property \Osf\Form\Helper\FormSelect $formSelect
 * @property \Osf\Form\Helper\FormSubmit $formSubmit
 * @property \Osf\Form\Helper\FormTags $formTags
 * @property \Osf\Form\Helper\FormTextarea $formTextarea
 * @property \Osf\Form\Helper\FormWithDecorators $formWithDecorators
 * @property \Osf\Form\Helper\Label $label
 * @method string baseUrl($uri = '', $withHost = false)
 * @method string footTags()
 * @method string headTags()
 * @method \Osf\View\Helper\Html html($content, $elt = null, array $attributes = array(), $escape = true)
 * @method \Osf\View\Helper\HtmlList htmlList($type = null)
 * @method \Osf\View\Helper\Link link($label, $controller = null, $action = null, array $params = array(), array $attributes = array(), $htmlElement = 'a', array $cssClasses = array())
 * @method string menuBar($items, $color = 'trans')
 * @method \Osf\View\Helper\Script script()
 * @method string url($controller = null, $action = null, array $params = null, $transferParamKeys = null)
 * @method \Osf\View\Helper\Bootstrap\Accordion accordion($status = null)
 * @method \Osf\View\Helper\Bootstrap\Alert alert($title = null, $content = null, $status = null, $icon = null)
 * @method \Osf\View\Helper\Bootstrap\Msg bigMsg($content = null, $subContent = null, $status = 'info')
 * @method \Osf\View\Helper\Bootstrap\Box box($title, $content = null, $badge = null, $coloredTitleBox = false, $collapsable = false, $expandable = false, $removable = false)
 * @method \Osf\View\Helper\Bootstrap\Breadcrumb breadcrumb()
 * @method \Osf\View\Helper\Bootstrap\Button button($label = null, $url = null, $status = null, $icon = null, $block = false, $disabled = false, $flat = false, $size = null)
 * @method \Osf\View\Helper\Bootstrap\ButtonGroup buttonGroup(array $buttons = array(), $vertical = false)
 * @method \Osf\View\Helper\Bootstrap\Callout callout($title = null, $content = null, $status = null)
 * @method \Osf\View\Helper\Bootstrap\Grid grid($namespace = null)
 * @method \Osf\View\Helper\Bootstrap\Box help($helpFileBaseName, $controller = 'info')
 * @method \Osf\View\Helper\Bootstrap\Icon icon($icon = null, $status = null, $iconColor = null, $animated = false)
 * @method \Osf\View\Helper\Bootstrap\InfoBox infoBox($title, $value, $icon = null, $color = null, $percentage = null, $progressDescription = null)
 * @method bool isAjax($ai = null)
 * @method \Osf\View\Helper\Bootstrap\LinkApp linkApp($label, $controller = null, $action = null, array $params = array(), array $attributes = array(), $htmlElement = 'a', array $cssClasses = array())
 * @method \Osf\View\Helper\Bootstrap\ListGroup listGroup()
 * @method \Osf\View\Helper\Bootstrap\Load load($url = null, $icon = null)
 * @method \Osf\View\Helper\Bootstrap\Markdown markdown($separator = null)
 * @method \Osf\View\Helper\Bootstrap\Modal modal($id, $title = null, $content = null, $footer = null, $status = null)
 * @method \Osf\View\Helper\Bootstrap\ModalLink modalLink($label, $modalId, array $attributes = array(), $htmlElement = 'a', $escapeLabel = true)
 * @method \Osf\View\Helper\Bootstrap\Msg msg($content, $status = 'info')
 * @method \Osf\View\Helper\Bootstrap\Nav nav($stacked = false, $justified = false, $activeAutoDected = true)
 * @method \Osf\View\Helper\Bootstrap\Panel panel($title = null, $content = null, $footer = null, $status = null)
 * @method \Osf\View\Helper\Bootstrap\SmallBox smallBox($titleOrValue, $subTitle, $icon = null, $color = null, $linkLabel = null, $linkUrl = null, $linkIcon = 'fa-arrow-circle-right')
 * @method \Osf\View\Helper\Bootstrap\Table table($data = null)
 * @method \Osf\Form\Helper\Form form(\Osf\Form\AbstractForm $form)
 * @method string formCheckbox(\Osf\Form\Element\ElementCheckbox $element)
 * @method string formCheckboxes(\Osf\Form\Element\ElementCheckboxes $element)
 * @method \Osf\Form\Helper\FormFile formFile(\Osf\Form\Element\ElementFile $element)
 * @method string formHidden(\Osf\Form\Element\ElementHidden $element)
 * @method \Osf\Form\Helper\FormInput formInput(\Osf\Form\Element\ElementInput $element)
 * @method string formRadios(\Osf\Form\Element\ElementRadios $element)
 * @method string formReset(\Osf\Form\Element\ElementReset $element)
 * @method \Osf\Form\Helper\FormSelect formSelect(\Osf\Form\Element\ElementSelect $element)
 * @method string formSubmit(\Osf\Form\Element\ElementSubmit $element)
 * @method string formTags(\Osf\Form\Element\ElementInput $element)
 * @method string formTextarea(\Osf\Form\Element\ElementTextarea $element)
 * @method string formWithDecorators(\Osf\Form\AbstractForm $form)
 * @method string label($label = null, $for = null, array $attributes = array())
 */
abstract class AbstractGeneratedViewHelper extends AbstractHelper
{

    public static function getAvailableHelpers()
    {
        return array_merge(parent::getAvailableHelpers(), array (
          'baseUrl' => '\\Osf\\View\\Helper\\BaseUrl',
          'footTags' => '\\Osf\\View\\Helper\\FootTags',
          'headTags' => '\\Osf\\View\\Helper\\HeadTags',
          'html' => '\\Osf\\View\\Helper\\Html',
          'htmlList' => '\\Osf\\View\\Helper\\HtmlList',
          'link' => '\\Osf\\View\\Helper\\Link',
          'menuBar' => '\\Osf\\View\\Helper\\MenuBar',
          'script' => '\\Osf\\View\\Helper\\Script',
          'url' => '\\Osf\\View\\Helper\\Url',
          'accordion' => '\\Osf\\View\\Helper\\Bootstrap\\Accordion',
          'alert' => '\\Osf\\View\\Helper\\Bootstrap\\Alert',
          'bigMsg' => '\\Osf\\View\\Helper\\Bootstrap\\BigMsg',
          'box' => '\\Osf\\View\\Helper\\Bootstrap\\Box',
          'breadcrumb' => '\\Osf\\View\\Helper\\Bootstrap\\Breadcrumb',
          'button' => '\\Osf\\View\\Helper\\Bootstrap\\Button',
          'buttonGroup' => '\\Osf\\View\\Helper\\Bootstrap\\ButtonGroup',
          'callout' => '\\Osf\\View\\Helper\\Bootstrap\\Callout',
          'grid' => '\\Osf\\View\\Helper\\Bootstrap\\Grid',
          'help' => '\\Osf\\View\\Helper\\Bootstrap\\Help',
          'icon' => '\\Osf\\View\\Helper\\Bootstrap\\Icon',
          'infoBox' => '\\Osf\\View\\Helper\\Bootstrap\\InfoBox',
          'isAjax' => '\\Osf\\View\\Helper\\Bootstrap\\IsAjax',
          'linkApp' => '\\Osf\\View\\Helper\\Bootstrap\\LinkApp',
          'listGroup' => '\\Osf\\View\\Helper\\Bootstrap\\ListGroup',
          'load' => '\\Osf\\View\\Helper\\Bootstrap\\Load',
          'markdown' => '\\Osf\\View\\Helper\\Bootstrap\\Markdown',
          'modal' => '\\Osf\\View\\Helper\\Bootstrap\\Modal',
          'modalLink' => '\\Osf\\View\\Helper\\Bootstrap\\ModalLink',
          'msg' => '\\Osf\\View\\Helper\\Bootstrap\\Msg',
          'nav' => '\\Osf\\View\\Helper\\Bootstrap\\Nav',
          'panel' => '\\Osf\\View\\Helper\\Bootstrap\\Panel',
          'smallBox' => '\\Osf\\View\\Helper\\Bootstrap\\SmallBox',
          'table' => '\\Osf\\View\\Helper\\Bootstrap\\Table',
          'form' => '\\Osf\\Form\\Helper\\Form',
          'formCheckbox' => '\\Osf\\Form\\Helper\\FormCheckbox',
          'formCheckboxes' => '\\Osf\\Form\\Helper\\FormCheckboxes',
          'formFile' => '\\Osf\\Form\\Helper\\FormFile',
          'formHidden' => '\\Osf\\Form\\Helper\\FormHidden',
          'formInput' => '\\Osf\\Form\\Helper\\FormInput',
          'formRadios' => '\\Osf\\Form\\Helper\\FormRadios',
          'formReset' => '\\Osf\\Form\\Helper\\FormReset',
          'formSelect' => '\\Osf\\Form\\Helper\\FormSelect',
          'formSubmit' => '\\Osf\\Form\\Helper\\FormSubmit',
          'formTags' => '\\Osf\\Form\\Helper\\FormTags',
          'formTextarea' => '\\Osf\\Form\\Helper\\FormTextarea',
          'formWithDecorators' => '\\Osf\\Form\\Helper\\FormWithDecorators',
          'label' => '\\Osf\\Form\\Helper\\Label',
        ));
    }

}
