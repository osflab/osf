<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Component;

use Osf\View\Component;
use Osf\Form\Element\ElementSelect;
use Osf\Form\Element\ElementTags;

/**
 * Selectize component (input tags, select)
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package package
 * @subpackage subpackage
 * @link https://github.com/selectize/selectize.js/blob/master/docs/usage.md Usage & options
 */
class Selectize extends AbstractComponent
{
    protected function createScript($id, array $options)
    {
        $optStr = implode(",", $options);
        return "$('#" . $id . "').selectize(" . ($optStr ? "{" . $optStr . "}" : '') . ');';
    }
    
    public function __construct()
    {
        if (Component::registerComponentScripts()) {
            $this->registerFootJs('/js/selectize.min.js', true);
        }
    }
    
    public function registerSelect(ElementSelect $select)
    {
        $options = [];
        $render = [];
        $load = '';
        if ($select->isMultiple()) {
            $options[] = 'plugins:[\'remove_button\']'; //,\'drag_drop\']';
        }
        if (!$select->getRequired()) {
            $options[] = 'allowEmptyOption:true';
        }
        if ($select->getMaxItems()) {
            $options[] = 'maxItems:' . $select->getMaxItems();
        }
        if ($select->getSelectOnTab()) {
            $options[] = 'selectOnTab:true';
        }
        if ($select->canCreate()) {
            $options[] = 'create:true';
            $options[] = 'createOnBlur:true';
            $addWord = __("Ajouter");
            $render[] = 'option_create:function(data,escape){return \'<div class="create">' . $addWord . ' <strong>\' + escape(data.input) + \'</strong>&hellip;</div>\';}';
        }
        if ($ac = $select->getAutocomplete()) {
            foreach ($ac['options'] as $key => $value) {
                if ($value !== null) {
                    $options[] = $key . ':\'' . $value . '\'';
                }
            }
            $tpl = $ac['itemTemplate'] ?: "'<div>' + escape(item." . $ac['options']['labelField'] . ") + '</div>'";
            $render[] = 'option:function(item,escape){return ' . $tpl . ';}';
            $load .= 'function(query,callback){'
                    . 'if(!query.length) return callback();'
                    . '$.ajax({'
                    . 'url: \'' . $ac['baseUrl'] . '\' + encodeURIComponent(query),'
                    . 'type: \'GET\','
                    . 'dataType: \'json\','
                    . 'error: function(){callback();},'
                    . 'success: function(res){callback(res);}'
                    . '});'
                    . '}';
            if (isset($ac['initialOptions'])) {
                $options[] = 'options:' . $ac['initialOptions'];
            }
            if (!$ac['options']['searchField'] && !isset($ac['options']['options']) && !isset($ac['initialOptions']) && !isset($ac['options']['score'])) {
                $options[] = 'score:function(){return function(){return 1;}}';
            }
//}';
            
            //$options[] = 'dataAttr:test';
            //$options[] = 'preload:true';
        }
        if ($render) {
            $options[] = 'render:{' . implode(',', $render) . '}';
        }
        if ($load) {
            $options[] = 'load:' . $load;
        }
        $this->registerScript($this->createScript($select->getId(), $options));
    }
    
    public function registerTags(ElementTags $element)
    {
        $options = [
            'create:true',
            'createOnBlur:true',
            'persist:false',
            'delimiter:","'
            ];
        $this->registerScript($this->createScript($element->getId(), $options));
    }
}
