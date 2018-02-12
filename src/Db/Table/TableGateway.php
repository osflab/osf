<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Db\Table;

use Osf\Db\Row\RowGatewayInterface;

/**
 * Parent class for generated tables
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 9 nov. 2013
 * @package osf
 * @subpackage db
 */
class TableGateway extends AbstractTableGateway
{
    public function __construct(RowGatewayInterface $rowClass)
    {
        $this->rowClass = $rowClass;
    }
}
