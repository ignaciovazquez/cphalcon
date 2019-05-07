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

namespace Phalcon\Test\Unit\Http\Message\Uri;

use Codeception\Example;
use InvalidArgumentException;
use Phalcon\Http\Message\Uri;
use UnitTester;

/**
 * Class WithFragmentCest
 */
class WithFragmentCest
{
    /**
     * Tests Phalcon\Http\Message\Uri :: withFragment()
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2019-02-09
     */
    public function httpMessageUriWithFragment(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Uri - withFragment()');
        $query = 'https://phalcon:secret@dev.phalcon.ld:8080/action?param=value#%s';
        $uri   = new Uri(sprintf($query, 'frag'));

        $newInstance = $uri->withFragment('newspaper');
        $I->assertNotEquals($uri, $newInstance);
        $I->assertEquals('newspaper', $newInstance->getFragment());
        $I->assertEquals(sprintf($query, 'newspaper'), (string) $newInstance);
    }

    /**
     * Tests Phalcon\Http\Message\Uri :: withFragment() - exception no string
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalconphp.com>
     * @since        2019-02-07
     */
    public function httpUriWithFragmentException(UnitTester $I, Example $example)
    {
        $I->wantToTest('Http\Uri - withFragment() - exception - ' . $example[1]);
        $I->expectThrowable(
            new InvalidArgumentException(
                'Method requires a string argument instead of ' . $example[0]
            ),
            function () use ($example) {
                $query    = 'https://phalcon:secret@dev.phalcon.ld:8080/action?param=value#frag';
                $uri      = new Uri($query);
                $instance = $uri->withFragment($example[2]);
            }
        );
    }

    /**
     * @return array
     */
    private function getExamples(): array
    {
        return [
            ['NULL', 'null', null],
            ['boolean', 'true', true],
            ['boolean', 'false', false],
            ['integer', 'number', 1234],
            ['array', 'array', ['/action']],
            ['stdClass', 'object', (object) ['/action']],
        ];
    }
}
