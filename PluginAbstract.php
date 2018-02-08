<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Application;

/**
 * Application plugin parent class
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 26 sept. 2013
 * @package osf
 * @subpackage plugin
 */
class PluginAbstract
{
    public function beforeRoute() {}
    public function afterRoute() {}
    public function beforeDispatchLoop() {}
    public function afterDispatchLoop() {}
    public function beforeAction() {}
    public function afterAction() {}
}
