<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Schooldirectory\Domain\Model\Holder;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\Holder.
 */
class HolderTest extends UnitTestCase
{
    /**
     * @var Holder
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Holder();
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
    public function getLogoInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getLogo());
    }

    /**
     * @test
     */
    public function setLogoSetsLogo(): void
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
    public function getWebsiteInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteSetsWebsite(): void
    {
        $this->subject->setWebsite('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getWebsite()
        );
    }
}
