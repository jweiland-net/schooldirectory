<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Schooldirectory\Domain\Model\CareForm;
use JWeiland\Schooldirectory\Domain\Model\Holder;
use JWeiland\Schooldirectory\Domain\Model\ProfileContent;
use JWeiland\Schooldirectory\Domain\Model\School;
use JWeiland\Schooldirectory\Domain\Model\SchoolDistrict;
use JWeiland\Schooldirectory\Domain\Model\Type;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case
 */
class SchoolTest extends FunctionalTestCase
{
    /**
     * @var School
     */
    protected School $subject;

    protected array $testExtensionsToLoad = [
        'typo3conf/ext/schooldirectory',
        'typo3conf/ext/glossary2',
        'typo3conf/ext/maps2',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new School();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function getLeaderInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLeader()
        );
    }

    /**
     * @test
     */
    public function setLeaderSetsLeader(): void
    {
        $this->subject->setLeader('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getLeader()
        );
    }

    /**
     * @test
     */
    public function getStreetInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetSetsStreet(): void
    {
        $this->subject->setStreet('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function getHouseNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getHouseNumber()
        );
    }

    /**
     * @test
     */
    public function setHouseNumberSetsHouseNumber(): void
    {
        $this->subject->setHouseNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getHouseNumber()
        );
    }

    /**
     * @test
     */
    public function getZipInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipSetsZip(): void
    {
        $this->subject->setZip('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function getCityInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCitySetsCity(): void
    {
        $this->subject->setCity('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone(): void
    {
        $this->subject->setTelephone('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function getTelephoneAlternativeInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephoneAlternative()
        );
    }

    /**
     * @test
     */
    public function setTelephoneAlternativeSetsTelephoneAlternative(): void
    {
        $this->subject->setTelephoneAlternative('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephoneAlternative()
        );
    }

    /**
     * @test
     */
    public function getFaxInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFax()
        );
    }

    /**
     * @test
     */
    public function setFaxSetsFax(): void
    {
        $this->subject->setFax('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getFax()
        );
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function getEmailAlternativeInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmailAlternative()
        );
    }

    /**
     * @test
     */
    public function setEmailAlternativeSetsEmailAlternative(): void
    {
        $this->subject->setEmailAlternative('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmailAlternative()
        );
    }

    /**
     * @test
     */
    public function getWebsiteInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteSetsWebsite(): void
    {
        $this->subject->setWebsite('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function getLogoInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getLogo());
    }

    /**
     * @test
     */
    public function setLogoSetsLogo(): void
    {
        $instance = new FileReference();
        $this->subject->setLogo($instance);

        self::assertSame(
            $instance,
            $this->subject->getLogo()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setImages($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function addImageAddsOneImage(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setImages($objectStorage);

        $object = new FileReference();
        $this->subject->addImage($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function removeImageRemovesOneImage(): void
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setImages($objectStorage);

        $this->subject->removeImage($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getAmountOfStudentsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAmountOfStudents()
        );
    }

    /**
     * @test
     */
    public function setAmountOfStudentsSetsAmountOfStudents(): void
    {
        $this->subject->setAmountOfStudents('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getAmountOfStudents()
        );
    }

    /**
     * @test
     */
    public function getProfileTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getProfileTitle()
        );
    }

    /**
     * @test
     */
    public function setProfileTitleSetsProfileTitle(): void
    {
        $this->subject->setProfileTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getProfileTitle()
        );
    }

    /**
     * @test
     */
    public function getSchoolWayPlanInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSchoolWayPlan()
        );
    }

    /**
     * @test
     */
    public function setSchoolWayPlanSetsSchoolWayPlan(): void
    {
        $this->subject->setSchoolWayPlan('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getSchoolWayPlan()
        );
    }

    /**
     * @test
     */
    public function getNotesInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function setNotesSetsNotes(): void
    {
        $this->subject->setNotes('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function getAdditionalInformationsInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAdditionalInformations()
        );
    }

    /**
     * @test
     */
    public function setAdditionalInformationsSetsAdditionalInformations(): void
    {
        $this->subject->setAdditionalInformations('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getAdditionalInformations()
        );
    }

    /**
     * @test
     */
    public function getFacebookInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFacebook()
        );
    }

    /**
     * @test
     */
    public function setFacebookSetsFacebook(): void
    {
        $this->subject->setFacebook('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getFacebook()
        );
    }

    /**
     * @test
     */
    public function getTwitterInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTwitter()
        );
    }

    /**
     * @test
     */
    public function setTwitterSetsTwitter(): void
    {
        $this->subject->setTwitter('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTwitter()
        );
    }

    /**
     * @test
     */
    public function getInstagramInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getInstagram()
        );
    }

    /**
     * @test
     */
    public function setInstagramSetsInstagram(): void
    {
        $this->subject->setInstagram('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getInstagram()
        );
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getHolderInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getHolder());
    }

    /**
     * @test
     */
    public function setHolderSetsHolder(): void
    {
        $instance = new Holder();
        $this->subject->setHolder($instance);

        self::assertSame(
            $instance,
            $this->subject->getHolder()
        );
    }

    /**
     * @test
     */
    public function getTypesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function setTypesSetsTypes(): void
    {
        $object = new Type();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setTypes($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function addTypeAddsOneType(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setTypes($objectStorage);

        $object = new Type();
        $this->subject->addType($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function removeTypeRemovesOneType(): void
    {
        $object = new Type();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setTypes($objectStorage);

        $this->subject->removeType($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function getProfileContentsInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function setProfileContentsSetsProfileContents(): void
    {
        $object = new ProfileContent();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setProfileContents($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function addProfileContentAddsOneProfileContent(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setProfileContents($objectStorage);

        $object = new ProfileContent();
        $this->subject->addProfileContent($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function removeProfileContentRemovesOneProfileContent(): void
    {
        $object = new ProfileContent();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setProfileContents($objectStorage);

        $this->subject->removeProfileContent($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function getCareFormsInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function setCareFormsSetsCareForms(): void
    {
        $object = new CareForm();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setCareForms($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function addCareFormAddsOneCareForm(): void
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setCareForms($objectStorage);

        $object = new CareForm();
        $this->subject->addCareForm($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function removeCareFormRemovesOneCareForm(): void
    {
        $object = new CareForm();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setCareForms($objectStorage);

        $this->subject->removeCareForm($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function getSchoolDistrictInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getSchoolDistrict());
    }

    /**
     * @test
     */
    public function setSchoolDistrictSetsSchoolDistrict(): void
    {
        $instance = new SchoolDistrict();
        $this->subject->setSchoolDistrict($instance);

        self::assertSame(
            $instance,
            $this->subject->getSchoolDistrict()
        );
    }
}
