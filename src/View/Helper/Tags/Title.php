<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper\Tags;

/**
 * Title head tag
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 13 déc. 2013
 * @package osf
 * @subpackage view
 */
trait Title
{
    protected $title = null;
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = (string) $title;
    }
    
    public function appendTitle($title, $separator = ' - ')
    {
        $this->title .= $separator . $title;
    }
    
    public function buildTitle()
    {
        $title = $this->title !== null ? trim($this->title) : '';
        if ($title) {
            return '<title>' . $title . '</title>' . "\n";
        }
        return '';
    }
}
