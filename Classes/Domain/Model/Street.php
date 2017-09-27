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
 * Class Street
 *
 * @package JWeiland\Schooldirectory\Domain\Model
 */
class Street extends AbstractEntity
{
    /**
     * Street
     *
     * @var string
     */
    protected $street = '';

    /**
     * house number from
     *
     * @var string
     */
    protected $numberFrom = '';

    /**
     * house number to
     *
     * @var string
     */
    protected $numberTo = '';

    /**
     * School district
     *
     * @var \JWeiland\Schooldirectory\Domain\Model\District
     * @lazy
     */
    protected $district;

    /**
     * Returns the street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     *
     * @param string $street
     * @return void
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * Returns the numberFrom
     *
     * @return string $numberFrom
     */
    public function getNumberFrom()
    {
        return $this->numberFrom;
    }

    /**
     * Sets the numberFrom
     *
     * @param string $numberFrom
     * @return void
     */
    public function setNumberFrom(string $numberFrom)
    {
        $this->numberFrom = $numberFrom;
    }

    /**
     * Returns the numberTo
     *
     * @return string $numberTo
     */
    public function getNumberTo()
    {
        return $this->numberTo;
    }

    /**
     * Sets the numberTo
     *
     * @param string $numberTo
     * @return void
     */
    public function setNumberTo(string $numberTo)
    {
        $this->numberTo = $numberTo;
    }

    /**
     * Returns the district
     *
     * @return District $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @param District $district
     * @return void
     */
    public function setDistrict(District $district)
    {
        $this->district = $district;
    }
}
