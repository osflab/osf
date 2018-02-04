<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Exception;

/**
 * Exception with HTTP code
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 14 sept. 2013
 * @package osf
 * @subpackage exception
 */
class HttpException extends OsfException
{
    protected $managedCodes = array(404, 301);
    
    public function __construct($message = null, $code = null, $previous = null)
    {
        if (!in_array($code, $this->managedCodes)) {
            $httpCodes = implode(', ', $this->managedCodes);
            $msg = sprintf('HttpException launched without known http code. Choose one of theses: %s', $httpCodes);
            throw new ArchException($msg);
        }
        parent::__construct($message, $code, $previous);
    }
}
