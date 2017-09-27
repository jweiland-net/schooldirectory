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

use JWeiland\Maps2\Domain\Model\PoiCollection;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class School
 *
 * @package JWeiland\Schooldirectory\Domain\Model
 */
class School extends AbstractEntity
{
    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Leader
     *
     * @var string
     */
    protected $leader = '';

    /**
     * Street
     *
     * @var string
     */
    protected $street = '';

    /**
     * House number
     *
     * @var string
     */
    protected $houseNumber = '';

    /**
     * Zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * City
     *
     * @var string
     */
    protected $city = '';

    /**
     * Telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * Telephone alternative
     *
     * @var string
     */
    protected $telephoneAlternative = '';

    /**
     * Fax
     *
     * @var string
     */
    protected $fax = '';

    /**
     * Email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Email alternative
     *
     * @var string
     */
    protected $emailAlternative = '';

    /**
     * Website
     *
     * @var string
     */
    protected $website = '';

    /**
     * Logo
     *
     * @var \JWeiland\Schooldirectory\Domain\Model\FileReference
     */
    protected $logo;

    /**
     * Images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * Amount of students
     *
     * @var string
     */
    protected $amountOfStudents = '';

    /**
     * Profile title
     *
     * @var string
     */
    protected $profileTitle = '';

    /**
     * School way plan
     *
     * @var string
     */
    protected $schoolWayPlan = '';

    /**
     * Notes
     *
     * @var string
     */
    protected $notes = '';

    /**
     * Additional Informations
     *
     * @var string
     */
    protected $additionalInformations = '';

    /**
     * Facebook
     *
     * @var string
     */
    protected $facebook = '';

    /**
     * Twitter
     *
     * @var string
     */
    protected $twitter = '';

    /**
     * Google
     *
     * @var string
     */
    protected $google = '';

    /**
     * TxMaps2Uid
     *
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * Holder
     *
     * @var \JWeiland\Schooldirectory\Domain\Model\Holder
     * @lazy
     */
    protected $holder;

    /**
     * Types
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\Type>
     * @lazy
     */
    protected $types;

    /**
     * Profile contents
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\ProfileContent>
     * @lazy
     */
    protected $profileContents;

    /**
     * Care forms
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\CareForm>
     * @lazy
     */
    protected $careForms;

    /**
     * School district
     *
     * @var \JWeiland\Schooldirectory\Domain\Model\SchoolDistrict
     * @lazy
     */
    protected $schoolDistrict;

    /**
     * district
     *
     * @var \JWeiland\Schooldirectory\Domain\Model\District
     * @lazy
     */
    protected $district;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->types = new ObjectStorage();
        $this->profileContents = new ObjectStorage();
        $this->careForms = new ObjectStorage();
    }

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
     * Returns the leader
     *
     * @return string $leader
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Sets the leader
     *
     * @param string $leader
     * @return void
     */
    public function setLeader(string $leader)
    {
        $this->leader = $leader;
    }

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
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the telephone
     *
     * @return string $telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the telephoneAlternative
     *
     * @return string $telephoneAlternative
     */
    public function getTelephoneAlternative()
    {
        return $this->telephoneAlternative;
    }

    /**
     * Sets the telephoneAlternative
     *
     * @param string $telephoneAlternative
     * @return void
     */
    public function setTelephoneAlternative(string $telephoneAlternative)
    {
        $this->telephoneAlternative = $telephoneAlternative;
    }

    /**
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the emailAlternative
     *
     * @return string $emailAlternative
     */
    public function getEmailAlternative()
    {
        return $this->emailAlternative;
    }

    /**
     * Sets the emailAlternative
     *
     * @param string $emailAlternative
     * @return void
     */
    public function setEmailAlternative(string $emailAlternative)
    {
        $this->emailAlternative = $emailAlternative;
    }

    /**
     * Returns the website
     *
     * @return string $website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Sets the website
     *
     * @param string $website
     * @return void
     */
    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    /**
     * Returns the logo
     *
     * @return \JWeiland\Schooldirectory\Domain\Model\FileReference $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the logo
     *
     * @param FileReference $logo
     * @return void
     */
    public function setLogo(FileReference $logo)
    {
        $this->logo = $logo;
    }

    /**
     * Returns the images
     *
     * @return ObjectStorage $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param ObjectStorage $images
     * @return void
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the amountOfStudents
     *
     * @return string $amountOfStudents
     */
    public function getAmountOfStudents()
    {
        return $this->amountOfStudents;
    }

    /**
     * Sets the amountOfStudents
     *
     * @param string $amountOfStudents
     * @return void
     */
    public function setAmountOfStudents(string $amountOfStudents)
    {
        $this->amountOfStudents = $amountOfStudents;
    }

    /**
     * Returns the profileTitle
     *
     * @return string $profileTitle
     */
    public function getProfileTitle()
    {
        return $this->profileTitle;
    }

    /**
     * Sets the profileTitle
     *
     * @param string $profileTitle
     * @return void
     */
    public function setProfileTitle(string $profileTitle)
    {
        $this->profileTitle = $profileTitle;
    }

    /**
     * Returns the schoolWayPlan
     *
     * @return string $schoolWayPlan
     */
    public function getSchoolWayPlan()
    {
        return $this->schoolWayPlan;
    }

    /**
     * Sets the schoolWayPlan
     *
     * @param string $schoolWayPlan
     * @return void
     */
    public function setSchoolWayPlan(string $schoolWayPlan)
    {
        $this->schoolWayPlan = $schoolWayPlan;
    }

    /**
     * Returns the additionalInformations
     *
     * @return string $additionalInformations
     */
    public function getAdditionalInformations()
    {
        return $this->additionalInformations;
    }

    /**
     * Sets the additionalInformations
     *
     * @param string $additionalInformations
     * @return void
     */
    public function setAdditionalInformations(string $additionalInformations)
    {
        $this->additionalInformations = $additionalInformations;
    }

    /**
     * Returns the facebook
     *
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook
     *
     * @param string $facebook
     * @return void
     */
    public function setFacebook(string $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Returns the twitter
     *
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Sets the twitter
     *
     * @param string $twitter
     * @return void
     */
    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Returns the google
     *
     * @return string $google
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * Sets the google
     *
     * @param string $google
     * @return void
     */
    public function setGoogle(string $google)
    {
        $this->google = $google;
    }

    /**
     * Returns the notes
     *
     * @return string $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the notes
     *
     * @param string $notes
     * @return void
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }

    /**
     * Returns the txMaps2Uid
     *
     * @return PoiCollection $txMaps2Uid
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets the txMaps2Uid
     *
     * @param PoiCollection $txMaps2Uid
     * @return void
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * Returns the holder
     *
     * @return Holder $holder
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Sets the holder
     *
     * @param Holder $holder
     * @return void
     */
    public function setHolder(Holder $holder)
    {
        $this->holder = $holder;
    }

    /**
     * Adds a Type
     *
     * @param Type $type
     * @return void
     */
    public function addType(Type $type)
    {
        $this->types->attach($type);
    }

    /**
     * Removes a Type
     *
     * @param Type $typeToRemove The Type to be removed
     * @return void
     */
    public function removeType(Type $typeToRemove)
    {
        $this->types->detach($typeToRemove);
    }

    /**
     * Returns the types
     *
     * @return ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\Type> $types
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Sets the types
     *
     * @param ObjectStorage $types
     * @return void
     */
    public function setTypes(ObjectStorage $types)
    {
        $this->types = $types;
    }

    /**
     * Adds a ProfileContent
     *
     * @param ProfileContent $profileContent
     * @return void
     */
    public function addProfileContent(ProfileContent $profileContent)
    {
        $this->profileContents->attach($profileContent);
    }

    /**
     * Removes a ProfileContent
     *
     * @param ProfileContent $profileContentToRemove The ProfileContent to be
     *     removed
     * @return void
     */
    public function removeProfileContent(ProfileContent $profileContentToRemove)
    {
        $this->profileContents->detach($profileContentToRemove);
    }

    /**
     * Returns the profileContents
     *
     * @return ObjectStorage $profileContents
     */
    public function getProfileContents()
    {
        return $this->profileContents;
    }

    /**
     * Sets the profileContents
     *
     * @param ObjectStorage $profileContents
     * @return void
     */
    public function setProfileContents(ObjectStorage $profileContents)
    {
        $this->profileContents = $profileContents;
    }

    /**
     * Adds a CareForm
     *
     * @param CareForm $careForm
     * @return void
     */
    public function addCareForm(CareForm $careForm)
    {
        $this->careForms->attach($careForm);
    }

    /**
     * Removes a CareForm
     *
     * @param CareForm $careFormToRemove The CareForm to be removed
     * @return void
     */
    public function removeCareForm(CareForm $careFormToRemove)
    {
        $this->careForms->detach($careFormToRemove);
    }

    /**
     * Returns the careForms
     *
     * @return ObjectStorage<\JWeiland\Schooldirectory\Domain\Model\CareForm> $careForms
     */
    public function getCareForms()
    {
        return $this->careForms;
    }

    /**
     * Sets the careForms
     *
     * @param ObjectStorage $careForms
     * @return void
     */
    public function setCareForms(ObjectStorage $careForms)
    {
        $this->careForms = $careForms;
    }

    /**
     * Returns the schoolDistrict
     *
     * @return SchoolDistrict $schoolDistrict
     */
    public function getSchoolDistrict()
    {
        return $this->schoolDistrict;
    }

    /**
     * Sets the schoolDistrict
     *
     * @param SchoolDistrict $schoolDistrict
     * @return void
     */
    public function setSchoolDistrict(SchoolDistrict $schoolDistrict)
    {
        $this->schoolDistrict = $schoolDistrict;
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

    /**
     * Returns the houseNumber
     *
     * @return string houseNumber
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Sets the houseNumber
     *
     * @param string $houseNumber
     * @return void
     */
    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }
}
