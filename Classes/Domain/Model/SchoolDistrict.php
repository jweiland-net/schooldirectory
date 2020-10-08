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
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $streets;

    public function __construct()
    {
        $this->streets = new ObjectStorage();
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
