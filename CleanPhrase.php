<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Filter;

use Osf\Filter\AbstractFilter;
use Osf\Stream\Text;

/**
 * Clean double spaces, -, etc.
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage filter
 */
class CleanPhrase extends AbstractFilter
{
    public function filter($value)
    {
        return Text::cleanPhrase($value);
    }
}
