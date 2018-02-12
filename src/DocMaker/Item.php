<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\DocMaker;

/**
 * Entity class representing an unitary document content
 * 
 * @author Guillaume Ponçon <guillaume.poncon@wanadoo.fr>
 * @version 2.0
 * @since 2.0 Thu Sep 21 12:52:50 CEST 2006
 * @copyright 2006 Guillaume Ponçon - all rights reserved
 * @package osf
 * @subpackage docmaker
 */
class Item {

    /**
     * Document item type
     * @var string
     */
    protected $type;
    
    /**
     * Document content
     * @var mixed
     */
    protected $content;
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = (string) $type;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = (string) $content;
    }
}
