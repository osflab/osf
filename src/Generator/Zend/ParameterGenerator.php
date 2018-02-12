<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Generator\Zend;

use Zend\Code\Generator\ParameterGenerator as ZPG;

/**
 * Zend ParameterGenerator with simple types generation
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage generator
 */
class ParameterGenerator extends ZPG
{
    protected static $simple = ['resource', 'mixed', 'object'];
}
