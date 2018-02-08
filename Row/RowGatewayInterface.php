<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Db\Row;

/**
 * Each row must implements this interface
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 9 nov. 2013
 * @package osf
 * @subpackage db
 */
interface RowGatewayInterface
{
    /**
     * @param string $field
     * @param mixed $value
     * @return RowGatewayInterface
     */
    public function set($field, $value);
    
    /**
     * @param string $field
     */
    public function get($field);
    
    /**
     * @return string
     */
    public function getSchema();
    
    /**
     * @return array
     */
    public function toArray();
    
    /**
     * @param array $data
     * @param bool $rowExistsInDatabase
     */
    //public function populate(array $data, $rowExistsInDatabase = false);
}
