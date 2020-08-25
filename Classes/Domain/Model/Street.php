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
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

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
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
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
    public function setStreet(string $street): void
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
    public function setNumberFrom(string $numberFrom): void
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
    public function setNumberTo(string $numberTo): void
    {
        $this->numberTo = $numberTo;
    }

    /**
     * @return District|null|LazyLoadingProxy
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param District|null $district
     */
    public function setDistrict(District $district = null): void
    {
        $this->district = $district;
    }
}
