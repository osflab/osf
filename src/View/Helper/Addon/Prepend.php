<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Addon;

use Osf\Stream\Text as T;

/**
 * Content to put before the element. If there is a container, we stay inside.
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
trait Prepend
{
    protected $prependContent;
    
    /**
     * @param string|null $content
     * @return $this
     */
    public function setPrepend($content)
    {
        $this->prependContent = T::strOrNull($content);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPrepend()
    {
        return $this->prependContent;
    }
    
    /**
     * @return string|null
     */
    public function hasPrepend()
    {
        return $this->prependContent !== null;
    }
    
    protected function initPrepend(array $vars)
    {
        $this->prependContent = array_key_exists('prependContent', $vars) ? $vars['prependContent'] : null;
    }
}
