<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */
 
namespace Osf\View\Helper\Bootstrap;

use Osf\View\Helper\Addon\Title;
use Osf\View\Helper\Addon\Content;
use Osf\View\Helper\Addon\EltDecoration;
use Osf\View\Helper\Bootstrap\AbstractViewHelper as AVH;

/**
 * Bootstrap callout message
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage view
 */
class Callout extends AVH
{
    use Title;
    use Content;
    use EltDecoration;
    use Addon\Status;

    /**
     * Information box with title
     * @param string|null $title
     * @param string|null $content
     * @param string|null $status
     * @return \Osf\View\Helper\Bootstrap\Callout
     */
    public function __invoke(string $title = null, string $content = null, string $status = null)
    {
        $this->initValues(get_defined_vars());
        return $this;
    }
    
    /**
     * @return string
     */
    protected function render()
    {
        $this->addCssClasses([
            'callout',
            'callout-' . $this->getStatus()
        ]);
        return $this 
            ->html('<div' . $this->getEltDecorationStr() . '>')
            ->html('  <h4>' . $this->title . '</h4>', $this->title)
            ->html($this->content, $this->content)
            ->html('</div>')
            ->getHtml();
    }
}
