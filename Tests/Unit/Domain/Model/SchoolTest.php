<?php

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
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case for class \JWeiland\Schooldirectory\Domain\Model\School.
 */
class SchoolTest extends UnitTestCase
{
    /**
     * @var School
     */
    protected $subject;

    /**
     * set up class
     */
    public function setUp()
    {
        $this->subject = new School();
    }

    /**
     * tear down class
     */
    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
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
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getLeaderInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getLeader()
        );
    }

    /**
     * @test
     */
    public function setLeaderSetsLeader()
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
    public function setLeaderWithIntegerResultsInString()
    {
        $this->subject->setLeader(123);
        self::assertSame('123', $this->subject->getLeader());
    }

    /**
     * @test
     */
    public function setLeaderWithBooleanResultsInString()
    {
        $this->subject->setLeader(true);
        self::assertSame('1', $this->subject->getLeader());
    }

    /**
     * @test
     */
    public function getStreetInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetSetsStreet()
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
    public function setStreetWithIntegerResultsInString()
    {
        $this->subject->setStreet(123);
        self::assertSame('123', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function setStreetWithBooleanResultsInString()
    {
        $this->subject->setStreet(true);
        self::assertSame('1', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function getHouseNumberInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getHouseNumber()
        );
    }

    /**
     * @test
     */
    public function setHouseNumberSetsHouseNumber()
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
    public function setHouseNumberWithIntegerResultsInString()
    {
        $this->subject->setHouseNumber(123);
        self::assertSame('123', $this->subject->getHouseNumber());
    }

    /**
     * @test
     */
    public function setHouseNumberWithBooleanResultsInString()
    {
        $this->subject->setHouseNumber(true);
        self::assertSame('1', $this->subject->getHouseNumber());
    }

    /**
     * @test
     */
    public function getZipInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipSetsZip()
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
    public function setZipWithIntegerResultsInString()
    {
        $this->subject->setZip(123);
        self::assertSame('123', $this->subject->getZip());
    }

    /**
     * @test
     */
    public function setZipWithBooleanResultsInString()
    {
        $this->subject->setZip(true);
        self::assertSame('1', $this->subject->getZip());
    }

    /**
     * @test
     */
    public function getCityInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCitySetsCity()
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
    public function setCityWithIntegerResultsInString()
    {
        $this->subject->setCity(123);
        self::assertSame('123', $this->subject->getCity());
    }

    /**
     * @test
     */
    public function setCityWithBooleanResultsInString()
    {
        $this->subject->setCity(true);
        self::assertSame('1', $this->subject->getCity());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone()
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
    public function setTelephoneWithIntegerResultsInString()
    {
        $this->subject->setTelephone(123);
        self::assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        self::assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getTelephoneAlternativeInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTelephoneAlternative()
        );
    }

    /**
     * @test
     */
    public function setTelephoneAlternativeSetsTelephoneAlternative()
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
    public function setTelephoneAlternativeWithIntegerResultsInString()
    {
        $this->subject->setTelephoneAlternative(123);
        self::assertSame('123', $this->subject->getTelephoneAlternative());
    }

    /**
     * @test
     */
    public function setTelephoneAlternativeWithBooleanResultsInString()
    {
        $this->subject->setTelephoneAlternative(true);
        self::assertSame('1', $this->subject->getTelephoneAlternative());
    }

    /**
     * @test
     */
    public function getFaxInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getFax()
        );
    }

    /**
     * @test
     */
    public function setFaxSetsFax()
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
    public function setFaxWithIntegerResultsInString()
    {
        $this->subject->setFax(123);
        self::assertSame('123', $this->subject->getFax());
    }

    /**
     * @test
     */
    public function setFaxWithBooleanResultsInString()
    {
        $this->subject->setFax(true);
        self::assertSame('1', $this->subject->getFax());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
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
    public function setEmailWithIntegerResultsInString()
    {
        $this->subject->setEmail(123);
        self::assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        self::assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getEmailAlternativeInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmailAlternative()
        );
    }

    /**
     * @test
     */
    public function setEmailAlternativeSetsEmailAlternative()
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
    public function setEmailAlternativeWithIntegerResultsInString()
    {
        $this->subject->setEmailAlternative(123);
        self::assertSame('123', $this->subject->getEmailAlternative());
    }

    /**
     * @test
     */
    public function setEmailAlternativeWithBooleanResultsInString()
    {
        $this->subject->setEmailAlternative(true);
        self::assertSame('1', $this->subject->getEmailAlternative());
    }

    /**
     * @test
     */
    public function getWebsiteInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getWebsite()
        );
    }

    /**
     * @test
     */
    public function setWebsiteSetsWebsite()
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
    public function setWebsiteWithIntegerResultsInString()
    {
        $this->subject->setWebsite(123);
        self::assertSame('123', $this->subject->getWebsite());
    }

    /**
     * @test
     */
    public function setWebsiteWithBooleanResultsInString()
    {
        $this->subject->setWebsite(true);
        self::assertSame('1', $this->subject->getWebsite());
    }

    /**
     * @test
     */
    public function getLogoInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getLogo());
    }

    /**
     * @test
     */
    public function setLogoSetsLogo()
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
    public function getImagesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages()
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
    public function addImageAddsOneImage()
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
    public function removeImageRemovesOneImage()
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
    public function getAmountOfStudentsInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getAmountOfStudents()
        );
    }

    /**
     * @test
     */
    public function setAmountOfStudentsSetsAmountOfStudents()
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
    public function setAmountOfStudentsWithIntegerResultsInString()
    {
        $this->subject->setAmountOfStudents(123);
        self::assertSame('123', $this->subject->getAmountOfStudents());
    }

    /**
     * @test
     */
    public function setAmountOfStudentsWithBooleanResultsInString()
    {
        $this->subject->setAmountOfStudents(true);
        self::assertSame('1', $this->subject->getAmountOfStudents());
    }

    /**
     * @test
     */
    public function getProfileTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getProfileTitle()
        );
    }

    /**
     * @test
     */
    public function setProfileTitleSetsProfileTitle()
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
    public function setProfileTitleWithIntegerResultsInString()
    {
        $this->subject->setProfileTitle(123);
        self::assertSame('123', $this->subject->getProfileTitle());
    }

    /**
     * @test
     */
    public function setProfileTitleWithBooleanResultsInString()
    {
        $this->subject->setProfileTitle(true);
        self::assertSame('1', $this->subject->getProfileTitle());
    }

    /**
     * @test
     */
    public function getSchoolWayPlanInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getSchoolWayPlan()
        );
    }

    /**
     * @test
     */
    public function setSchoolWayPlanSetsSchoolWayPlan()
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
    public function setSchoolWayPlanWithIntegerResultsInString()
    {
        $this->subject->setSchoolWayPlan(123);
        self::assertSame('123', $this->subject->getSchoolWayPlan());
    }

    /**
     * @test
     */
    public function setSchoolWayPlanWithBooleanResultsInString()
    {
        $this->subject->setSchoolWayPlan(true);
        self::assertSame('1', $this->subject->getSchoolWayPlan());
    }

    /**
     * @test
     */
    public function getNotesInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function setNotesSetsNotes()
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
    public function setNotesWithIntegerResultsInString()
    {
        $this->subject->setNotes(123);
        self::assertSame('123', $this->subject->getNotes());
    }

    /**
     * @test
     */
    public function setNotesWithBooleanResultsInString()
    {
        $this->subject->setNotes(true);
        self::assertSame('1', $this->subject->getNotes());
    }

    /**
     * @test
     */
    public function getAdditionalInformationsInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getAdditionalInformations()
        );
    }

    /**
     * @test
     */
    public function setAdditionalInformationsSetsAdditionalInformations()
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
    public function setAdditionalInformationsWithIntegerResultsInString()
    {
        $this->subject->setAdditionalInformations(123);
        self::assertSame('123', $this->subject->getAdditionalInformations());
    }

    /**
     * @test
     */
    public function setAdditionalInformationsWithBooleanResultsInString()
    {
        $this->subject->setAdditionalInformations(true);
        self::assertSame('1', $this->subject->getAdditionalInformations());
    }

    /**
     * @test
     */
    public function getFacebookInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getFacebook()
        );
    }

    /**
     * @test
     */
    public function setFacebookSetsFacebook()
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
    public function setFacebookWithIntegerResultsInString()
    {
        $this->subject->setFacebook(123);
        self::assertSame('123', $this->subject->getFacebook());
    }

    /**
     * @test
     */
    public function setFacebookWithBooleanResultsInString()
    {
        $this->subject->setFacebook(true);
        self::assertSame('1', $this->subject->getFacebook());
    }

    /**
     * @test
     */
    public function getTwitterInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTwitter()
        );
    }

    /**
     * @test
     */
    public function setTwitterSetsTwitter()
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
    public function setTwitterWithIntegerResultsInString()
    {
        $this->subject->setTwitter(123);
        self::assertSame('123', $this->subject->getTwitter());
    }

    /**
     * @test
     */
    public function setTwitterWithBooleanResultsInString()
    {
        $this->subject->setTwitter(true);
        self::assertSame('1', $this->subject->getTwitter());
    }

    /**
     * @test
     */
    public function getGoogleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getGoogle()
        );
    }

    /**
     * @test
     */
    public function setGoogleSetsGoogle()
    {
        $this->subject->setGoogle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getGoogle()
        );
    }

    /**
     * @test
     */
    public function setGoogleWithIntegerResultsInString()
    {
        $this->subject->setGoogle(123);
        self::assertSame('123', $this->subject->getGoogle());
    }

    /**
     * @test
     */
    public function setGoogleWithBooleanResultsInString()
    {
        $this->subject->setGoogle(true);
        self::assertSame('1', $this->subject->getGoogle());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
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
    public function getHolderInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getHolder());
    }

    /**
     * @test
     */
    public function setHolderSetsHolder()
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
    public function getTypesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function setTypesSetsTypes()
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
    public function addTypeAddsOneType()
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
    public function removeTypeRemovesOneType()
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
    public function getProfileContentsInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function setProfileContentsSetsProfileContents()
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
    public function addProfileContentAddsOneProfileContent()
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
    public function removeProfileContentRemovesOneProfileContent()
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
    public function getCareFormsInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function setCareFormsSetsCareForms()
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
    public function addCareFormAddsOneCareForm()
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
    public function removeCareFormRemovesOneCareForm()
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
    public function getSchoolDistrictInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getSchoolDistrict());
    }

    /**
     * @test
     */
    public function setSchoolDistrictSetsSchoolDistrict()
    {
        $instance = new SchoolDistrict();
        $this->subject->setSchoolDistrict($instance);

        self::assertSame(
            $instance,
            $this->subject->getSchoolDistrict()
        );
    }
}
