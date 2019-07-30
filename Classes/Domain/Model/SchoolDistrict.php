<?php
declare(strict_types=1);
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

/**
 * Domain model for school destrict
 */
class SchoolDistrict extends AbstractEntity
{
    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Care forms
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\Street>
     * @lazy
     */
    protected $streets;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the streets
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $streets
     */
    public function getStreets()
    {
        return $this->streets;
    }

    /**
     * Sets the streets
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $streets
     *
     * @return void
     */
    public function setStreets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $streets)
    {
        $this->streets = $streets;
    }
}
