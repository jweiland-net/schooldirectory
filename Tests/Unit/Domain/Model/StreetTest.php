<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Schooldirectory\Domain\Model\District;
use JWeiland\Schooldirectory\Domain\Model\Street;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\Street.
 */
class StreetTest extends UnitTestCase
{
    protected Street $subject;

    protected function setUp(): void
    {
        $this->subject = new Street();
    }

    protected function tearDown(): void
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getStreetInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetSetsStreet(): void
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
    public function getNumberFromInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumberFrom()
        );
    }

    /**
     * @test
     */
    public function setNumberFromSetsNumberFrom(): void
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
    public function getNumberToInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumberTo()
        );
    }

    /**
     * @test
     */
    public function setNumberToSetsNumberTo(): void
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
    public function getDistrictInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getDistrict());
    }

    /**
     * @test
     */
    public function setDistrictSetsDistrict(): void
    {
        $instance = new District();
        $this->subject->setDistrict($instance);

        self::assertSame(
            $instance,
            $this->subject->getDistrict()
        );
    }
}
