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
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Main school domain model
 */
class School extends AbstractEntity
{
    protected string $title = '';

    protected string $leader = '';

    protected string $street = '';

    protected string $houseNumber = '';

    protected string $zip = '';

    protected string $city = '';

    protected string $telephone = '';

    protected string $telephoneAlternative = '';

    protected string $fax = '';

    protected string $email = '';

    protected string $emailAlternative = '';

    protected string $website = '';

    protected ?FileReference $logo = null;

    /**
     * @var ObjectStorage<FileReference>
     *
     * @Extbase\ORM\Lazy
     */
    protected ObjectStorage $images;

    protected string $amountOfStudents = '';

    protected string $profileTitle = '';

    protected string $schoolWayPlan = '';

    protected string $notes = '';

    protected string $additionalInformations = '';

    protected string $facebook = '';

    protected string $twitter = '';

    protected string $instagram = '';

    /**
     * @var PoiCollection
     */
    protected $txMaps2Uid;

    protected ?Holder $holder = null;

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

    protected ?SchoolDistrict $schoolDistrict = null;

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
        $this->images ??= new ObjectStorage();
        $this->types ??= new ObjectStorage();
        $this->profileContents ??= new ObjectStorage();
        $this->careForms ??= new ObjectStorage();
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
