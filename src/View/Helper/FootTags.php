<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\View\Helper;

use Osf\View\Helper\Tags\Script;

/**
 * Head links
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates 2017
 * @version 1.0
 * @since OSF-2.0 - 5 jan 2017
 * @package osf
 * @subpackage view
 */
class FootTags extends AbstractViewHelper
{
    use Script;
    
    public function __invoke()
    {
        $output  = $this->buildFiles();
        $output .= $this->buildScripts();
        return $output;
    }
}
