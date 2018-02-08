<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Application;

use Locale as PhpLocale;

/**
 * I18n
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage locale
 */
class Locale extends PhpLocale
{
    public function getLangKey()
    {
        return $this->getPrimaryLanguage($this->getDefault());
    }
    
    public function getLangName()
    {
        return $this->getDisplayName($this->getDefault());
    }
}
