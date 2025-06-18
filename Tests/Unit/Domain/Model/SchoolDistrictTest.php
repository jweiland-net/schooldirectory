<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Schooldirectory\Domain\Model\SchoolDistrict;
use JWeiland\Schooldirectory\Domain\Model\Street;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\SchoolDistrict.
 */
class SchoolDistrictTest extends UnitTestCase
{
    protected SchoolDistrict $subject;

    protected function setUp(): void
    {
        $this->subject = new SchoolDistrict();
    }

    protected function tearDown(): void
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function getStreetsInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getStreets()
        );
    }

    /**
     * @test
     */
    public function setStreetsSetsStreets(): void
    {
        $object = new Street();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);

        $this->subject->setStreets($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getStreets()
        );
    }

    /**
     * @test
     */
    public function addStreetAddsOneStreet(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setStreets($objectStorage);

        $object = new Street();
        $this->subject->addStreet($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getStreets()
        );
    }

    /**
     * @test
     */
    public function removeStreetRemovesOneStreet(): void
    {
        $object = new Street();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);

        $this->subject->setStreets($objectStorage);

        $this->subject->removeStreet($object);

        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getStreets()
        );
    }
}
