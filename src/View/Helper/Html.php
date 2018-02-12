<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper;

use Osf\View\Helper\AbstractViewHelper as AVH;
use Osf\View\Helper\Bootstrap\Tools\Checkers;
use Osf\Container\OsfContainer as Container;
use Osf\Stream\Text as T;

/**
 * Bootstrap panels
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
class Html extends AVH
{
    const CROP_AUTO = 'auto';
    
    use Addon\EltDecoration;
    use Bootstrap\Addon\Tooltip;
    use Bootstrap\Addon\Popover;
    use Bootstrap\Addon\Menu;
    
    protected $content;
    protected $elt;
    protected $escape;
    protected $mobile = null;
    protected $tablet = null;
    protected $mobileCrop = null;
    
    /**
     * @param string $type
     * @return \Osf\View\Helper\Html
     */
    public function __invoke($content, string $elt = null, array $attributes = [], bool $escape = true)
    {
        $this->resetDecorations();
        $this->initValues(get_defined_vars());
        $this->content = (string) $content;
        $this->setElement((string) $elt);
        $this->escape = $escape;
        $this->mobile = null;
        $this->tablet = null;
        $this->mobileCrop = null;
        return clone $this;
    }
    
    /**
     * Set an html element to decorate data
     * @param string $elt
     * @return $this
     */
    public function setElement(string $elt)
    {
        $this->elt = $elt;
        return $this;
    }
    
    /**
     * Generate only for mobiles
     * @return $this
     */
    public function mobileOnly()
    {
        $this->mobile = true;
        return $this;
    }
    
    /**
     * Do not generate for mobiles and hide content on little screens
     * @return $this
     */
    public function mobileExclude()
    {
        $this->mobile = false;
        return $this;
    }
    
    /**
     * Generate only for mobiles and tablets
     * @return $this
     */
    public function mobileAndTabletOnly()
    {
        $this->tablet = true;
        return $this;
    }
    
    /**
     * Do not generate for mobiles and tablets, hide content on little screens
     * @return $this
     */
    public function mobileAndTabletExclude()
    {
        $this->tablet = false;
        return $this;
    }
    
    /**
     * Maximum chars count for little screens
     * @param $nbChars int|null|'auto'
     * @return $this
     */
    public function mobileCrop($nbChars = self::CROP_AUTO)
    {
        $this->mobileCrop = $nbChars === null ? null : 
                ($nbChars === self::CROP_AUTO ? self::CROP_AUTO : (int) $nbChars);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMobileCrop()
    {
        return $this->mobileCrop;
    }
    
    /**
     * Escape output or not
     * @param bool $trueOrFalse
     * @return $this
     */
    public function escape(bool $trueOrFalse = true)
    {
        $this->escape = $trueOrFalse;
        return $this;
    }
    
    /**
     * @param string $type
     * @return \Osf\View\Helper\HtmlList
     */
    public function setType(string $type)
    {
        if ($type !== self::TYPE_UL && $type !== self::TYPE_OL) {
            Checkers::notice('Bad list type [' . $type . '].');
        } else {
            $this->type = $type;
        }
        return $this;
    }
    
    /**
     * @param string $html
     * @return \Osf\View\Helper\HtmlList
     */
    public function addItem(string $html)
    {
        $this->items[] = $html;
        return $this;
    }
    
    /**
     * Return HTML content
     * @return string
     */
    protected function render()
    {
        if ($this->mobile !== null || $this->tablet !== null) {
            if (($this->mobile === false && Container::getDevice()->isMobile())
            ||  ($this->tablet === false && Container::getDevice()->isMobileOrTablet())) {
                return '';
            }
            if (($this->mobile === true && !Container::getDevice()->isMobile())
            ||  ($this->tablet === true && !Container::getDevice()->isMobileOrTablet())) {
                $this->addCssClass('visible-xs-inline');
            }
            else if (($this->mobile === false || $this->tablet === false) 
            &&  !Container::getDevice()->isMobileOrTablet()) {
                $this->addCssClass('hidden-xs');
            }
        }
        $this->content .= $this->getHtml();
        $this->lines = [];
        if ($this->mobileCrop && $this->mobileCrop !== self::CROP_AUTO) {
            $croppedContent = T::crop($this->content, $this->mobileCrop);
            if (Container::getDevice()->isMobile()) {
                $content = $this->escape ? $this->esc($croppedContent) : $croppedContent;
                unset($croppedContent);
            } else {
                $content = $this->escape ? $this->esc($this->content) : $this->content;
                $this->addCssClass('hidden-xs');
                $croppedContent = $this->escape ? $this->esc($croppedContent) : $croppedContent;
            }
        }
        if (!isset($content)) {
            $content = $this->escape ? $this->esc($this->content) : $this->content;
        }
        if ($this->mobileCrop === self::CROP_AUTO) {
            $this->addCssClass('text-overflow');
        }
        $this->setAttributes($this->getTooltipAttributes());
        $this->setAttributes($this->getPopoverAttributes());
        $this->addCssClasses($this->getMenuCssClasses());
        $this->setAttributes($this->getMenuAttributes());
        $menuOrientation = $this->menu ? ' ' . $this->menu->getOrientationClass() : '';
        if (!$this->elt && $this->getAttributes()) {
            $this->setElement('span');
        }
        $this->elt !== '' && $this->html('<' . $this->elt . $this->getEltDecorationStr() . '>');
        $this->html($content);
        $this->elt !== '' && $this->html('</' . $this->elt . '>');
        if (isset($croppedContent)) {
            $this->removeCssClass('hidden-xs');
            $this->addCssClass('visible-xs-inline');
            $this->html('<' . $this->elt . $this->getEltDecorationStr() . '>');
            $this->html($croppedContent);
            $this->html('</' . $this->elt . '>');
        }
        $html = $this->getHtml();
        if ($this->menu) {
            $html = $this
                ->html('<div class="inline dropdown clickable' . $menuOrientation . '">')
                ->html($html)
                ->html((string) $this->menu)
                ->html('</div>')
                ->getHtml();
        }
        
        return $html;
    }
}
