<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Controller\Request;

use Osf\Container\OsfContainer;

/**
 * Request unit test
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 12 sept. 2013
 * @package osf
 * @subpackage test
 */
class Test extends \Osf\Test\Runner
{
    public static function run()
    {
        self::reset();

        $request = OsfContainer::getRequest();
        self::assert($request instanceof \Osf\Controller\Request, 'Bad request object');
        self::assert(is_null($request->getController()), 'Controller defined ?');

        return self::getResult();
    }
}
