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

use JWeiland\Maps2\Domain\Model\PoiCollection;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Main school domain model
 */
class School extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $leader = '';

    /**
     * @var string
     */
    protected $street = '';

    /**
     * @var string
     */
    protected $houseNumber = '';

    /**
     * @var string
     */
    protected $zip = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $telephone = '';

    /**
     * @var string
     */
    protected $telephoneAlternative = '';

    /**
     * @var string
     */
    protected $fax = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $emailAlternative = '';

    /**
     * @var string
     */
    protected $website = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $logo;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var string
     */
    protected $amountOfStudents = '';

    /**
     * @var string
     */
    protected $profileTitle = '';

    /**
     * @var string
     */
    protected $schoolWayPlan = '';

    /**
     * @var string
     */
    protected $notes = '';

    /**
     * @var string
     */
    protected $additionalInformations = '';

    /**
     * @var string
     */
    protected $facebook = '';

    /**
     * @var string
     */
    protected $twitter = '';

    /**
     * @var string
     */
    protected $google = '';

    /**
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var \JWeiland\Schooldirectory\Domain\Model\Holder
     * @lazy
     */
    protected $holder;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\Type>
     * @lazy
     */
    protected $types;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\ProfileContent>
     * @lazy
     */
    protected $profileContents;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\CareForm>
     * @lazy
     */
    protected $careForms;

    /**
     * @var \JWeiland\Schooldirectory\Domain\Model\SchoolDistrict
     * @lazy
     */
    protected $schoolDistrict;

    /**
     * @var \JWeiland\Schooldirectory\Domain\Model\District
     * @lazy
     */
    protected $district;

    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     */
    protected function initStorageObjects()
    {
        $this->images = new ObjectStorage();
        $this->types = new ObjectStorage();
        $this->profileContents = new ObjectStorage();
        $this->careForms = new ObjectStorage();
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
     * @return string
     */
    public function getLeader(): string
    {
        return $this->leader;
    }

    /**
     * @param string $leader
     */
    public function setLeader(string $leader)
    {
        $this->leader = $leader;
    }

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
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getTelephoneAlternative(): string
    {
        return $this->telephoneAlternative;
    }

    /**
     * @param string $telephoneAlternative
     */
    public function setTelephoneAlternative(string $telephoneAlternative)
    {
        $this->telephoneAlternative = $telephoneAlternative;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmailAlternative(): string
    {
        return $this->emailAlternative;
    }

    /**
     * @param string $emailAlternative
     */
    public function setEmailAlternative(string $emailAlternative)
    {
        $this->emailAlternative = $emailAlternative;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    /**
     * @return FileReference|null $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param FileReference|null $logo
     */
    public function setLogo(FileReference $logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return ObjectStorage
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * @param FileReference $image
     */
    public function addImage(FileReference $image)
    {
        $this->images->attach($image);
    }

    /**
     * @param FileReference $image
     */
    public function removeImage(FileReference $image)
    {
        $this->images->detach($image);
    }

    /**
     * @return string
     */
    public function getAmountOfStudents(): string
    {
        return $this->amountOfStudents;
    }

    /**
     * @param string $amountOfStudents
     */
    public function setAmountOfStudents(string $amountOfStudents)
    {
        $this->amountOfStudents = $amountOfStudents;
    }

    /**
     * @return string
     */
    public function getProfileTitle(): string
    {
        return $this->profileTitle;
    }

    /**
     * @param string $profileTitle
     */
    public function setProfileTitle(string $profileTitle)
    {
        $this->profileTitle = $profileTitle;
    }

    /**
     * @return string
     */
    public function getSchoolWayPlan(): string
    {
        return $this->schoolWayPlan;
    }

    /**
     * @param string $schoolWayPlan
     */
    public function setSchoolWayPlan(string $schoolWayPlan)
    {
        $this->schoolWayPlan = $schoolWayPlan;
    }

    /**
     * @return string
     */
    public function getAdditionalInformations(): string
    {
        return $this->additionalInformations;
    }

    /**
     * @param string $additionalInformations
     */
    public function setAdditionalInformations(string $additionalInformations)
    {
        $this->additionalInformations = $additionalInformations;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook(string $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter(): string
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getGoogle(): string
    {
        return $this->google;
    }

    /**
     * @param string $google
     */
    public function setGoogle(string $google)
    {
        $this->google = $google;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return PoiCollection|null
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * @param PoiCollection|null $txMaps2Uid
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid = null)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * @return Holder|null
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param Holder|null $holder
     */
    public function setHolder(Holder $holder = null)
    {
        $this->holder = $holder;
    }

    /**
     * @return ObjectStorage
     */
    public function getTypes(): ObjectStorage
    {
        return $this->types;
    }

    /**
     * @param ObjectStorage $types
     */
    public function setTypes(ObjectStorage $types)
    {
        $this->types = $types;
    }

    /**
     * @param Type $type
     */
    public function addType(Type $type)
    {
        $this->types->attach($type);
    }

    /**
     * @param Type $type
     */
    public function removeType(Type $type)
    {
        $this->types->detach($type);
    }

    /**
     * @return ObjectStorage
     */
    public function getProfileContents(): ObjectStorage
    {
        return $this->profileContents;
    }

    /**
     * @param ObjectStorage $profileContents
     */
    public function setProfileContents(ObjectStorage $profileContents)
    {
        $this->profileContents = $profileContents;
    }

    /**
     * @param ProfileContent $profileContent
     */
    public function addProfileContent(ProfileContent $profileContent)
    {
        $this->profileContents->attach($profileContent);
    }

    /**
     * @param ProfileContent $profileContent
     */
    public function removeProfileContent(ProfileContent $profileContent)
    {
        $this->profileContents->detach($profileContent);
    }

    /**
     * @return ObjectStorage
     */
    public function getCareForms(): ObjectStorage
    {
        return $this->careForms;
    }

    /**
     * @param ObjectStorage $careForms
     */
    public function setCareForms(ObjectStorage $careForms)
    {
        $this->careForms = $careForms;
    }

    /**
     * @param CareForm $careForm
     */
    public function addCareForm(CareForm $careForm)
    {
        $this->careForms->attach($careForm);
    }

    /**
     * @param CareForm $careForm
     */
    public function removeCareForm(CareForm $careForm)
    {
        $this->careForms->detach($careForm);
    }

    /**
     * @return SchoolDistrict|null
     */
    public function getSchoolDistrict()
    {
        return $this->schoolDistrict;
    }

    /**
     * @param SchoolDistrict|null $schoolDistrict
     */
    public function setSchoolDistrict(SchoolDistrict $schoolDistrict = null)
    {
        $this->schoolDistrict = $schoolDistrict;
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
    public function setDistrict(District $district)
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }
}
