<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

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
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function setStreetWithBooleanResultsInString()
    {
        $this->subject->setStreet(true);
        self::assertSame('1', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function getNumberFromInitiallyReturnsEmptyString()
    {
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getNumberFrom());
    }

    /**
     * @test
     */
    public function setNumberFromWithBooleanResultsInString()
    {
        $this->subject->setNumberFrom(true);
        self::assertSame('1', $this->subject->getNumberFrom());
    }

    /**
     * @test
     */
    public function getNumberToInitiallyReturnsEmptyString()
    {
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getNumberTo());
    }

    /**
     * @test
     */
    public function setNumberToWithBooleanResultsInString()
    {
        $this->subject->setNumberTo(true);
        self::assertSame('1', $this->subject->getNumberTo());
    }

    /**
     * @test
     */
    public function getDistrictInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getDistrict());
    }

    /**
     * @test
     */
    public function setDistrictSetsDistrict()
    {
        $instance = new District();
        $this->subject->setDistrict($instance);

        self::assertSame(
            $instance,
            $this->subject->getDistrict()
        );
    }
}
