<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Form\Decorator;

/**
 * Form decorator : table
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2013
 * @version 1.0
 * @since OSF-2.0 - 6 déc. 2013
 * @package osf
 * @subpackage form
 * @deprecated
 */
class DecoratorFormTable extends DecoratorFormAbstract
{
    protected $beforeForm     = "\n";
    protected $afterForm      = "\n";
    protected $beforeElements = "\n <table class=\"osform\">\n";
    protected $afterElements  = " </table>\n";
    protected $beforeLabel    = "  <tr><td>";
    protected $afterLabel     = "</td>\n";
    protected $beforeElement  = "  <td>";
    protected $afterElement   = "</td></tr>\n";
    protected $beforeErrors   = "  <ul class=\"osformerrors\">\n";
    protected $afterErrors    = "  </ul>\n";
    protected $beforeError    = "   <li>";
    protected $afterError     = "<li>\n";
}
