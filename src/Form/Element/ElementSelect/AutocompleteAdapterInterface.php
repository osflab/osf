<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Element\ElementSelect;

use Osf\Form\Element\ElementSelect;

/**
 * Autocomplete adapter interface
 * 
 * Classes which implements this interface need to be able to decorate
 * a select element with an autocompletion process.
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage form
 */
interface AutocompleteAdapterInterface
{
    public function registerAutocomplete(ElementSelect $elt = null, ?int $limit = null): ElementSelect;
}
