<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Cache;

use Psr\SimpleCache\InvalidArgumentException as PsrInvalidArgumentException;
use Osf\Exception\ArchException;

/**
 * PSR6 compatible invalid argument exception
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-3.0.0 - 2018
 * @package osf
 * @subpackage cache
 */
class InvalidArgumentException 
    extends ArchException 
    implements PsrInvalidArgumentException
{
}
