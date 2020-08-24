<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Schooldirectory\Domain\Model\Holder;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\Holder.
 */
class HolderTest extends UnitTestCase
{
    /**
     * @var Holder
     */
    protected $subject;

    /**
     * set up class
     */
    public function setUp()
    {
        $this->subject = new Holder();
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
    public function getLogoInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getLogo());
    }

    /**
     * @test
     */
    public function setLogoSetsLogo()
    {
        $instance = new FileReference();
        $this->subject->setLogo($instance);

        self::assertSame(
            $instance,
            $this->subject->getLogo()
        );
    }

    /**
     * @test
     */
    public function getWebsiteInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteSetsWebsite()
    {
        $this->subject->setWebsite('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteWithIntegerResultsInString()
    {
        $this->subject->setWebsite(123);
        self::assertSame('123', $this->subject->getWebsite());
    }

    /**
     * @test
     */
    public function setWebsiteWithBooleanResultsInString()
    {
        $this->subject->setWebsite(true);
        self::assertSame('1', $this->subject->getWebsite());
    }
}
