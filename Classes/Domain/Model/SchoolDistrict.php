<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Domain model for school destrict
 */
class SchoolDistrict extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\Street>
     * @lazy
     */
    protected $streets;

    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     */
    protected function initStorageObjects(): void
    {
        $this->streets = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return ObjectStorage
     */
    public function getStreets(): ObjectStorage
    {
        return $this->streets;
    }

    /**
     * @param ObjectStorage $streets
     */
    public function setStreets(ObjectStorage $streets): void
    {
        $this->streets = $streets;
    }

    /**
     * @param Street $street
     */
    public function addStreet(Street $street): void
    {
        $this->streets->attach($street);
    }

    /**
     * @param Street $street
     */
    public function removeStreet(Street $street): void
    {
        $this->streets->detach($street);
    }
}
