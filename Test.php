<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\DocMaker;

use Osf\DocMaker\Markdown;

/**
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage test
 */
class Test extends \Osf\Test\Runner
{
    public static function run()
    {
        self::reset();
        
        $markdown = new Markdown();
        self::assertEqual($markdown->text('# bonjour'), '<h1>bonjour</h1>');
        
        return self::getResult();
    }
}
