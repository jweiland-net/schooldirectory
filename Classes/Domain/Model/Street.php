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

/**
 * Domain model for street for school.
 */
class Street extends AbstractEntity
{
    /**
     * @var string
     */
    protected $street = '';

    /**
     * @var string
     */
    protected $numberFrom = '';

    /**
     * @var string
     */
    protected $numberTo = '';

    /**
     * @var \JWeiland\Schooldirectory\Domain\Model\District
     * @lazy
     */
    protected $district;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getNumberFrom(): string
    {
        return $this->numberFrom;
    }

    /**
     * @param string $numberFrom
     */
    public function setNumberFrom(string $numberFrom)
    {
        $this->numberFrom = $numberFrom;
    }

    /**
     * @return string
     */
    public function getNumberTo(): string
    {
        return $this->numberTo;
    }

    /**
     * @param string $numberTo
     */
    public function setNumberTo(string $numberTo)
    {
        $this->numberTo = $numberTo;
    }

    /**
     * @return District|null
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param District|null $district
     */
    public function setDistrict(District $district = null)
    {
        $this->district = $district;
    }
}
