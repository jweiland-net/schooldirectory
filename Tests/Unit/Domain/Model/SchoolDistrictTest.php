<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Schooldirectory\Domain\Model\SchoolDistrict;
use JWeiland\Schooldirectory\Domain\Model\Street;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\SchoolDistrict.
 */
class SchoolDistrictTest extends UnitTestCase
{
    /**
     * @var SchoolDistrict
     */
    protected $subject;

    /**
     * set up class
     */
    public function setUp()
    {
        $this->subject = new SchoolDistrict();
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
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
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
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getStreetsInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getStreets()
        );
    }

    /**
     * @test
     */
    public function setStreetsSetsStreets()
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
    public function addStreetAddsOneStreet()
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
    public function removeStreetRemovesOneStreet()
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
