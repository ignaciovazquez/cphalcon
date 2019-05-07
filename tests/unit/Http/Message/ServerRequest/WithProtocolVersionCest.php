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

namespace Phalcon\Test\Unit\Http\Message\ServerRequest;

use Phalcon\Http\Message\ServerRequest;
use UnitTester;

/**
 * Class WithProtocolVersionCest
 */
class WithProtocolVersionCest
{
    /**
     * Tests Phalcon\Http\Message\ServerRequest :: withProtocolVersion()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-10
     */
    public function httpMessageServerRequestWithProtocolVersion(UnitTester $I)
    {
        $I->wantToTest('Http\Message\ServerRequest - withProtocolVersion()');
        $request     = new ServerRequest();
        $newInstance = $request->withProtocolVersion('2.0');

        $I->assertNotEquals($request, $newInstance);

        $expected = '1.1';
        $actual   = $request->getProtocolVersion();
        $I->assertEquals($expected, $actual);

        $expected = '2.0';
        $actual   = $newInstance->getProtocolVersion();
        $I->assertEquals($expected, $actual);
    }
}
