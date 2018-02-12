<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Hydrator;

use Osf\Form\AbstractForm;

/**
 * Form hydrator
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2013
 * @version 1.0
 * @since OSF-2.0 - 6 déc. 2013
 * @package package
 * @subpackage subpackage
 */
abstract class HydratorAbstract
{
    abstract public function hydrate(array $values, AbstractForm $form, bool $prefixedValues = true, bool $noError = false, bool $fullValues = false);
}
