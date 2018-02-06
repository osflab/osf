<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Container;

use Osf\Container\OsfContainer as Container;
use Osf\Container\VendorContainer;
use Osf\Test\Runner as OsfTest;

/**
 * Test class for container feature
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 11 sept. 2013
 * @package osf
 * @subpackage test
 */
class Test extends OsfTest
{
    public static function run()
    {
        self::reset();
        $application = Container::getApplication();
        self::assert($application instanceof \Osf\Application\OsfApplication, 'Object builded wrong');
        $obj = Container::buildObject('\stdClass');
        self::assert(is_object($obj), 'Obj is not an object');
        self::assert($obj instanceof \stdClass, 'Obj is not a stdclass instance');
        $obj2 = Container::buildObject('\stdClass', array(), 'new');
        self::assert($obj2 instanceof \stdClass, 'Obj2 is not a stdclass instance');
        self::assert($obj2 !== $obj, 'Obj2 and Obj is the same instance');
        $instances = Container::getInstances();
        self::assert(isset($instances['\Osf\Application\OsfApplication']['default']), 'An instance not found in container');
        self::assert(isset($instances['\stdClass']['default']), 'An instance not found in container');
        self::assert(isset($instances['\stdClass']['new']), 'An instance not found in container');
        Container::getConfig()->appendConfig(['redis' => ['auth' => 'masterflow']]);
        $string = 'Bonjour {{ contact.nom }}, ça va ?';
        $data = ['contact' => ['nom' => "Guillaume"]];
        $twig = VendorContainer::newTwig($string, null, false);
        self::assert($twig instanceof \Twig_TemplateWrapper);
        self::assert($twig->render($data) === 'Bonjour Guillaume, ça va ?');
        
        return self::getResult();
    }
}
