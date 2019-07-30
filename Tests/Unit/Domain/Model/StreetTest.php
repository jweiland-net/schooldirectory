<?php
namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

/*
 * This file is part of the schooldirectory project..
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\Schooldirectory\Domain\Model\District;
use JWeiland\Schooldirectory\Domain\Model\Street;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\Street.
 */
class StreetTest extends UnitTestCase
{
    /**
     * @var Street
     */
    protected $subject;

    /**
     * set up class
     */
    public function setUp()
    {
        $this->subject = new Street();
    }

    /**
     * tear down class
     */
    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getStreetInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetSetsStreet()
    {
        $this->subject->setStreet('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetWithIntegerResultsInString()
    {
        $this->subject->setStreet(123);
        $this->assertSame('123', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function setStreetWithBooleanResultsInString()
    {
        $this->subject->setStreet(true);
        $this->assertSame('1', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function getNumberFromInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getNumberFrom()
        );
    }

    /**
     * @test
     */
    public function setNumberFromSetsNumberFrom()
    {
        $this->subject->setNumberFrom('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getNumberFrom()
        );
    }

    /**
     * @test
     */
    public function setNumberFromWithIntegerResultsInString()
    {
        $this->subject->setNumberFrom(123);
        $this->assertSame('123', $this->subject->getNumberFrom());
    }

    /**
     * @test
     */
    public function setNumberFromWithBooleanResultsInString()
    {
        $this->subject->setNumberFrom(true);
        $this->assertSame('1', $this->subject->getNumberFrom());
    }

    /**
     * @test
     */
    public function getNumberToInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getNumberTo()
        );
    }

    /**
     * @test
     */
    public function setNumberToSetsNumberTo()
    {
        $this->subject->setNumberTo('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getNumberTo()
        );
    }

    /**
     * @test
     */
    public function setNumberToWithIntegerResultsInString()
    {
        $this->subject->setNumberTo(123);
        $this->assertSame('123', $this->subject->getNumberTo());
    }

    /**
     * @test
     */
    public function setNumberToWithBooleanResultsInString()
    {
        $this->subject->setNumberTo(true);
        $this->assertSame('1', $this->subject->getNumberTo());
    }

    /**
     * @test
     */
    public function getDistrictInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getDistrict());
    }

    /**
     * @test
     */
    public function setDistrictSetsDistrict()
    {
        $instance = new District();
        $this->subject->setDistrict($instance);

        $this->assertSame(
            $instance,
            $this->subject->getDistrict()
        );
    }
}
