<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\DocMaker\Template;

/**
 * DocMaker template interface
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 21 déc. 2013
 * @package osf
 * @subpackage docmaker
 */
interface TemplateInterface
{
    /**
     * @param string $itemType
     * @param string $content
     * @return \Osf\DocMaker\Template\TemplateInterface
     */
    public function prependItem($itemType, $content);

    /**
     * @param string $itemType
     * @param string $content
     * @return \Osf\DocMaker\Template\TemplateInterface
     */
    public function appendItem($itemType, $content);

    /**
     * @param array $content
     * @return string
     */
    public function render(array $content);
}
