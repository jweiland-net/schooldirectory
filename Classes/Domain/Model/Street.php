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
     */
    protected $district;

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getNumberFrom(): string
    {
        return $this->numberFrom;
    }

    public function setNumberFrom(string $numberFrom): void
    {
        $this->numberFrom = $numberFrom;
    }

    public function getNumberTo(): string
    {
        return $this->numberTo;
    }

    public function setNumberTo(string $numberTo): void
    {
        $this->numberTo = $numberTo;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): void
    {
        $this->district = $district;
    }
}
