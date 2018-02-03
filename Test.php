<?php

/*
 * This file is part of the OpenStates Framework (osf) package.
 * (c) Guillaume Ponçon <guillaume.poncon@openstates.com>
 * For the full copyright and license information, please read the LICENSE file distributed with the project.
 */

namespace Osf\Console;

use Osf\Test\Runner as OsfTest;
use Osf\Console\Base as Console;

/**
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
        
        self::assertEqual(Console::blue(), chr(033) . Console::COLOR_BEGIN_BLUE);
        self::assertEqual(Console::green(), chr(033) . Console::COLOR_BEGIN_GREEN);
        self::assertEqual(Console::red(), chr(033) . Console::COLOR_BEGIN_RED);
        self::assertEqual(Console::yellow(), chr(033) . Console::COLOR_BEGIN_YELLOW);
        self::assertEqual(Console::resetColor(), chr(033) . Console::COLOR_END);
        
        $expected = '- [1;34mAn action ...........................................................[0;0m [[1;32m  OK  [0;0m]';
        $str = filter_var(Console::beginActionMessage('An action', 80) . Console::endActionOK(), FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
        self::assertEqual($str, $expected);
        
        return self::getResult();
    }
}
