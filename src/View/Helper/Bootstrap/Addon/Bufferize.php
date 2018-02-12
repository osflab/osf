<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Bootstrap\Addon;

/**
 * Trait element for bufferized features 
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
trait Bufferize {
    
    protected $bufferized = false;

    /**
     * Start the output buffering
     * @return $this
     */
    public function start()
    {
        $this->bufferized = true;
        $newHelper = clone $this;
        $this->bufferized = false;
        return $newHelper;
    }
    
    /**
     * End the output buffering and display
     */
    protected function end()
    {
        $this->content = ob_get_clean();
        $this->bufferized = false;
        return $this;
    }
    
    public function __clone()
    {
        if ($this->bufferized) {
            ob_start();
        }
    }
    
    public function __toString() {
        if ($this->bufferized) {
            $this->end();
        }
        return $this->render();
    }
}
