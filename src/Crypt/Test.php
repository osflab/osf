<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Crypt;

use Osf\Crypt\Crypt;
use Osf\Test\Runner as OsfTest;

/**
 * Crypt unit tests
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 14 sept. 2013
 * @package osf
 * @subpackage test
 * @todo need to work without trim()
 */
class Test extends OsfTest
{
    public static function run()
    {
        self::reset();
        
        $cryptObj = new Crypt('THE CRYPT PHRASE', Crypt::MODE_ASCII);
        $encrypted = @$cryptObj->encrypt('Bonjour le monde');
        self::assert($encrypted == '55b5c566b7e84adbfbfbcf6ce6b47fdb07291db690169a57e5cc7dc947320d7d', 'No expected encrypted string');
        self::assert(trim(@$cryptObj->decrypt($encrypted)) == 'Bonjour le monde', 'Wrong bijectivity');
        
        return self::getResult();
    }
}
