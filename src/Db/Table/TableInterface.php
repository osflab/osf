<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Db\Table;

/**
 * Table with fields
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 10 nov. 2013
 * @package osf
 * @subpackage db
 */
interface TableInterface
{
    /**
     * @return array
     */
    public function getFields();
    
    /**
     * @return string
     */
    public function getTableName();
}
