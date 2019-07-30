<?php
declare(strict_types = 1);
namespace JWeiland\Schooldirectory\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
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
    protected function initStorageObjects()
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
    public function setTitle(string $title)
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
    public function setStreets(ObjectStorage $streets)
    {
        $this->streets = $streets;
    }

    /**
     * @param Street $street
     */
    public function addStreet(Street $street)
    {
        $this->streets->attach($street);
    }

    /**
     * @param Street $street
     */
    public function removeStreet(Street $street)
    {
        $this->streets->detach($street);
    }
}
