<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Helper;

/**
 * Prices manipulations
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage helper
 */
class Price
{
    /**
     * HT to TTC transformation
     * @param float $price
     * @param float $tax
     * @param bool $taxIsPercent
     * @return float
     */
    public static function htToTtc($price, $tax, bool $taxIsPercent = false)
    {
        if ($taxIsPercent) {
            $tax = $tax / 100;
        }
        return $price + ($price * $tax);
    }
    
    /**
     * TTC to HT transformation
     * @param float $price
     * @param float $tax
     * @param bool $taxIsPercent
     * @return float
     */
    public static function TtcToHt($price, $tax, bool $taxIsPercent = false)
    {
        if ($taxIsPercent) {
            $tax = $tax / 100;
        }
        return $price / (1 + $tax);
    }
    
    /**
     * Get a price minus the discount
     * @param float $price
     * @param float $discount
     * @param bool $discountIsPercent
     * @return float
     */
    public static function priceWithDiscount($price, $discount, bool $discountIsPercent = false)
    {
        if ($discountIsPercent) {
            $discount = $discount / 100;
        }
        return $price - ($price * $discount);
    }
}
