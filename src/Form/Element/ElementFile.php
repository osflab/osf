<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Element;

use Osf\View\Helper\Bootstrap\Tools\Checkers;

/**
 * File element
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2013
 * @version 1.0
 * @since OSF-2.0 - 6 déc. 2013
 * @package osf
 * @subpackage form
 */
class ElementFile extends ElementAbstract
{
    const ACCEPT_IMAGE = 'img';
    
    protected $accept;
    protected $autoUpload = false;
    protected $autoUploadUrl;
    
    public function acceptImage()
    {
        return $this->setAccept(self::ACCEPT_IMAGE);
    }
    
    /**
     * @return $this
     */
    public function setAccept($accept)
    {
        if ($accept !== null && $accept !== self::ACCEPT_IMAGE) {
            Checkers::notice('Bad accept type');
        }
        
        $this->accept = $accept;
        return $this;
    }

    public function getAccept()
    {
        return $this->accept;
    }
    
    /**
     * @return $this
     */
    public function setAutoUpload($autoUpload = true)
    {
        $this->autoUpload = (bool) $autoUpload;
        return $this;
    }

    public function getAutoUpload():bool
    {
        return $this->autoUpload;
    }
    
    /**
     * Auto upload url. Set automatically autoupload to true.
     * @return $this
     */
    public function setAutoUploadUrl($autoUploadUrl)
    {
        $this->autoUploadUrl = (string) $autoUploadUrl;
        $this->setAutoUpload(true);
        return $this;
    }

    public function getAutoUploadUrl()
    {
        return $this->autoUploadUrl;
    }
}
