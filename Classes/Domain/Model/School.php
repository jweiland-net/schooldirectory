<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use TYPO3\CMS\Extbase\Annotation as Extbase;
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
    protected string $title = '';

    /**
     * @var string
     */
    protected string $leader = '';

    /**
     * @var string
     */
    protected string $street = '';

    /**
     * @var string
     */
    protected string $houseNumber = '';

    /**
     * @var string
     */
    protected string $zip = '';

    /**
     * @var string
     */
    protected string $city = '';

    /**
     * @var string
     */
    protected string $telephone = '';

    /**
     * @var string
     */
    protected string $telephoneAlternative = '';

    /**
     * @var string
     */
    protected string $fax = '';

    /**
     * @var string
     */
    protected string $email = '';

    /**
     * @var string
     */
    protected string $emailAlternative = '';

    /**
     * @var string
     */
    protected string $website = '';

    /**
     * @var FileReference
     */
    protected FileReference $logo;

    /**
     * @var ObjectStorage<FileReference>
     *
     * @Extbase\ORM\Lazy
     */
    protected ObjectStorage $images;

    /**
     * @var string
     */
    protected string $amountOfStudents = '';

    /**
     * @var string
     */
    protected string $profileTitle = '';

    /**
     * @var string
     */
    protected string $schoolWayPlan = '';

    /**
     * @var string
     */
    protected string $notes = '';

    /**
     * @var string
     */
    protected string $additionalInformations = '';

    /**
     * @var string
     */
    protected string $facebook = '';

    /**
     * @var string
     */
    protected string $twitter = '';

    /**
     * @var string
     */
    protected string $instagram = '';

    /**
     * @var PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var Holder
     */
    protected Holder $holder;

    /**
     * @var ObjectStorage<Type>
     *
     * @Extbase\ORM\Lazy
     */
    protected ObjectStorage $types;

    /**
     * @var ObjectStorage<ProfileContent>
     *
     * @Extbase\ORM\Lazy
     */
    protected ObjectStorage $profileContents;

    /**
     * @var ObjectStorage<CareForm>
     *
     * @Extbase\ORM\Lazy
     */
    protected ObjectStorage $careForms;

    protected SchoolDistrict $schoolDistrict;

    protected District $district;

    public function __construct()
    {
        $this->images = new ObjectStorage();
        $this->types = new ObjectStorage();
        $this->profileContents = new ObjectStorage();
        $this->careForms = new ObjectStorage();
    }

    /**
     * Called again with initialize object, as fetching an entity from the DB does not use the constructor
     */
    public function initializeObject(): void
    {
        $this->images = $this->images ?? new ObjectStorage();
        $this->types = $this->types ?? new ObjectStorage();
        $this->profileContents = $this->profileContents ?? new ObjectStorage();
        $this->careForms = $this->careForms ?? new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLeader(): string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): void
    {
        $this->leader = $leader;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getTelephoneAlternative(): string
    {
        return $this->telephoneAlternative;
    }

    public function setTelephoneAlternative(string $telephoneAlternative): void
    {
        $this->telephoneAlternative = $telephoneAlternative;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmailAlternative(): string
    {
        return $this->emailAlternative;
    }

    public function setEmailAlternative(string $emailAlternative): void
    {
        $this->emailAlternative = $emailAlternative;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    public function setLogo(?FileReference $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return ObjectStorage<FileReference>
     */
    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage<FileReference> $images
     */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function addImage(FileReference $image): void
    {
        $this->images->attach($image);
    }

    public function removeImage(FileReference $image): void
    {
        $this->images->detach($image);
    }

    public function getAmountOfStudents(): string
    {
        return $this->amountOfStudents;
    }

    public function setAmountOfStudents(string $amountOfStudents): void
    {
        $this->amountOfStudents = $amountOfStudents;
    }

    public function getProfileTitle(): string
    {
        return $this->profileTitle;
    }

    public function setProfileTitle(string $profileTitle): void
    {
        $this->profileTitle = $profileTitle;
    }

    public function getSchoolWayPlan(): string
    {
        return $this->schoolWayPlan;
    }

    public function setSchoolWayPlan(string $schoolWayPlan): void
    {
        $this->schoolWayPlan = $schoolWayPlan;
    }

    public function getAdditionalInformations(): string
    {
        return $this->additionalInformations;
    }

    public function setAdditionalInformations(string $additionalInformations): void
    {
        $this->additionalInformations = $additionalInformations;
    }

    public function getFacebook(): string
    {
        return $this->facebook;
    }

    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getTwitter(): string
    {
        return $this->twitter;
    }

    public function setTwitter(string $twitter): void
    {
        $this->twitter = $twitter;
    }

    public function getInstagram(): string
    {
        return $this->instagram;
    }

    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(?PoiCollection $txMaps2Uid): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    public function getHolder(): ?Holder
    {
        return $this->holder;
    }

    public function setHolder(?Holder $holder): void
    {
        $this->holder = $holder;
    }

    /**
     * @return ObjectStorage<Type>
     */
    public function getTypes(): ObjectStorage
    {
        return $this->types;
    }

    /**
     * @param ObjectStorage<Type> $types
     */
    public function setTypes(ObjectStorage $types): void
    {
        $this->types = $types;
    }

    public function addType(Type $type): void
    {
        $this->types->attach($type);
    }

    public function removeType(Type $type): void
    {
        $this->types->detach($type);
    }

    /**
     * @return ObjectStorage<ProfileContent>
     */
    public function getProfileContents(): ObjectStorage
    {
        return $this->profileContents;
    }

    /**
     * @param ObjectStorage<ProfileContent> $profileContents
     */
    public function setProfileContents(ObjectStorage $profileContents): void
    {
        $this->profileContents = $profileContents;
    }

    public function addProfileContent(ProfileContent $profileContent): void
    {
        $this->profileContents->attach($profileContent);
    }

    public function removeProfileContent(ProfileContent $profileContent): void
    {
        $this->profileContents->detach($profileContent);
    }

    /**
     * @return ObjectStorage<CareForm>
     */
    public function getCareForms(): ObjectStorage
    {
        return $this->careForms;
    }

    /**
     * @param ObjectStorage<CareForm> $careForms
     */
    public function setCareForms(ObjectStorage $careForms): void
    {
        $this->careForms = $careForms;
    }

    public function addCareForm(CareForm $careForm): void
    {
        $this->careForms->attach($careForm);
    }

    public function removeCareForm(CareForm $careForm): void
    {
        $this->careForms->detach($careForm);
    }

    public function getSchoolDistrict(): ?SchoolDistrict
    {
        return $this->schoolDistrict;
    }

    public function setSchoolDistrict(SchoolDistrict $schoolDistrict): void
    {
        $this->schoolDistrict = $schoolDistrict;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): void
    {
        $this->district = $district;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }
}
