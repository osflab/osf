<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Validator;

use Osf\Validator\AbstractValidator;

/**
 * Currency validator
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage validator
 */
class Currency extends AbstractValidator
{
    const INVALID  = 'currencyInvalid';
    const NEGATIVE = 'currenctyNegative';

    /**
     * Validation failure message template definitions
     * @var array
     */
    protected $messageTemplates = [
        self::NEGATIVE => "Votre tarif ne doit pas être négatif",
        self::INVALID  => "Spécifiez un tarif valide",
    ];

    /**
     * Returns true if and only if $value only contains currency value
     * @param  string $value
     * @return bool
     */
    public function isValid($value)
    {
        if ((float) $value < 0) {
            $this->error(self::NEGATIVE);
            return false;
        }
        
        if (!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $value)) {
            $this->error(self::INVALID);
            return false;
        }

        return true;
    }
}
