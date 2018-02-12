<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Exception;

use Osf\Exception\PhpErrorException;
use Osf\Test\Runner as OsfTest;

/**
 * Exception test suite
 *
 * @author Guillaume Ponçon <guillaume.poncon@openstates.com>
 * @copyright OpenStates
 * @version 1.0
 * @since OSF-2.0 - 2017
 * @package osf
 * @subpackage test
 */
class Test extends OsfTest
{
    public static function run()
    {
        self::reset();
        
        self::assertEqual(PhpErrorException::startHandler(false, false), null);
        self::assertEqual(trigger_error('test', E_USER_WARNING), true);
        self::assertEqual(get_class(PhpErrorException::getLastError()), 'Osf\Exception\PhpError\UserWarningException');
        self::assertEqual(trigger_error('test', E_USER_NOTICE), true);
        self::assertEqual(get_class(PhpErrorException::getLastError()), 'Osf\Exception\PhpError\UserNoticeException');
        self::assertEqual(trigger_error('test', E_USER_ERROR), true);
        self::assertEqual(get_class(PhpErrorException::getLastError()), 'Osf\Exception\PhpError\UserErrorException');

        try {
            throw new HttpException('Unknown', 999);
        } catch (ArchException $e) {
            self::assert(strpos($e->getMessage(), 'HttpException launched without known http code. Choose one of theses: ') === 0);
        } catch (\Exception $e) {
            self::assert(false, 'Not expected: ' . $e->getMessage());
        }

        if (trait_exists('\Osf\View\Helper\Addon\Title')) {
            $e = (new AlertException('Message', 56))->setTitle('Title');
            self::assertEqual($e->getTitle(), 'Title');
            self::assertEqual($e->getStatus(), 'warning');
            self::assertEqual($e->getMessage(), 'Message');
        }

        return self::getResult();
    }
}
