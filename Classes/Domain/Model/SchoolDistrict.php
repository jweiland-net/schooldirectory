<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
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
     * @var ObjectStorage<Street>
     * @Extbase\ORM\Lazy
     */
    protected $streets;

    public function __construct()
    {
        $this->streets = new ObjectStorage();
    }

    /**
     * Called again with initialize object, as fetching an entity from the DB does not use the constructor
     */
    public function initializeObject(): void
    {
        $this->streets = $this->streets ?? new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getStreets(): ObjectStorage
    {
        return $this->streets;
    }

    public function setStreets(ObjectStorage $streets): void
    {
        $this->streets = $streets;
    }

    public function addStreet(Street $street): void
    {
        $this->streets->attach($street);
    }

    public function removeStreet(Street $street): void
    {
        $this->streets->detach($street);
    }
}
