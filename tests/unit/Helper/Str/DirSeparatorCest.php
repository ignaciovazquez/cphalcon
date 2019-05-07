<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Helper\Str;

use Phalcon\Helper\Str;
use UnitTester;

/**
 * Class DirSeparatorCest
 */
class DirSeparatorCest
{
    /**
     * Tests Phalcon\Helper\Str :: dirSeparator()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-04-16
     */
    public function helperStrFolderSeparator(UnitTester $I)
    {
        $I->wantToTest('Helper\Str - dirSeparator()');

        $expected = '/home/phalcon/';
        $actual   = Str::dirSeparator('/home/phalcon');
        $I->assertEquals($expected, $actual);

        $expected = '/home/phalcon/';
        $actual   = Str::dirSeparator('/home/phalcon//');
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Helper\Str :: dirSeparator() - empty string
     *
     * @param UnitTester $I
     */
    public function helperStrFolderSeparatorEmptyString(UnitTester $I)
    {
        $I->wantToTest('Helper\Str - dirSeparator() - empty string');
        $fileName = '';

        $expected = '/';
        $actual   = Str::dirSeparator($fileName);
        $I->assertEquals($expected, $actual);
    }
}
