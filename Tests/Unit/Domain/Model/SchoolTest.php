<?php
namespace JWeiland\Schooldirectory\Tests\Unit\Domain\Model;

/*
 * This file is part of the schooldirectory project..
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
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        $this->assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getLeaderInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getLeader());
    }

    /**
     * @test
     */
    public function setLeaderWithBooleanResultsInString()
    {
        $this->subject->setLeader(true);
        $this->assertSame('1', $this->subject->getLeader());
    }

    /**
     * @test
     */
    public function getStreetInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function setStreetWithBooleanResultsInString()
    {
        $this->subject->setStreet(true);
        $this->assertSame('1', $this->subject->getStreet());
    }

    /**
     * @test
     */
    public function getHouseNumberInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getHouseNumber());
    }

    /**
     * @test
     */
    public function setHouseNumberWithBooleanResultsInString()
    {
        $this->subject->setHouseNumber(true);
        $this->assertSame('1', $this->subject->getHouseNumber());
    }

    /**
     * @test
     */
    public function getZipInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getZip());
    }

    /**
     * @test
     */
    public function setZipWithBooleanResultsInString()
    {
        $this->subject->setZip(true);
        $this->assertSame('1', $this->subject->getZip());
    }

    /**
     * @test
     */
    public function getCityInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getCity());
    }

    /**
     * @test
     */
    public function setCityWithBooleanResultsInString()
    {
        $this->subject->setCity(true);
        $this->assertSame('1', $this->subject->getCity());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        $this->assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getTelephoneAlternativeInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTelephoneAlternative());
    }

    /**
     * @test
     */
    public function setTelephoneAlternativeWithBooleanResultsInString()
    {
        $this->subject->setTelephoneAlternative(true);
        $this->assertSame('1', $this->subject->getTelephoneAlternative());
    }

    /**
     * @test
     */
    public function getFaxInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getFax());
    }

    /**
     * @test
     */
    public function setFaxWithBooleanResultsInString()
    {
        $this->subject->setFax(true);
        $this->assertSame('1', $this->subject->getFax());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        $this->assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getEmailAlternativeInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEmailAlternative());
    }

    /**
     * @test
     */
    public function setEmailAlternativeWithBooleanResultsInString()
    {
        $this->subject->setEmailAlternative(true);
        $this->assertSame('1', $this->subject->getEmailAlternative());
    }

    /**
     * @test
     */
    public function getWebsiteInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getWebsite());
    }

    /**
     * @test
     */
    public function setWebsiteWithBooleanResultsInString()
    {
        $this->subject->setWebsite(true);
        $this->assertSame('1', $this->subject->getWebsite());
    }

    /**
     * @test
     */
    public function getLogoInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getLogo());
    }

    /**
     * @test
     */
    public function setLogoSetsLogo()
    {
        $instance = new FileReference();
        $this->subject->setLogo($instance);

        $this->assertSame(
            $instance,
            $this->subject->getLogo()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getAmountOfStudentsInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getAmountOfStudents());
    }

    /**
     * @test
     */
    public function setAmountOfStudentsWithBooleanResultsInString()
    {
        $this->subject->setAmountOfStudents(true);
        $this->assertSame('1', $this->subject->getAmountOfStudents());
    }

    /**
     * @test
     */
    public function getProfileTitleInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getProfileTitle());
    }

    /**
     * @test
     */
    public function setProfileTitleWithBooleanResultsInString()
    {
        $this->subject->setProfileTitle(true);
        $this->assertSame('1', $this->subject->getProfileTitle());
    }

    /**
     * @test
     */
    public function getSchoolWayPlanInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getSchoolWayPlan());
    }

    /**
     * @test
     */
    public function setSchoolWayPlanWithBooleanResultsInString()
    {
        $this->subject->setSchoolWayPlan(true);
        $this->assertSame('1', $this->subject->getSchoolWayPlan());
    }

    /**
     * @test
     */
    public function getNotesInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getNotes());
    }

    /**
     * @test
     */
    public function setNotesWithBooleanResultsInString()
    {
        $this->subject->setNotes(true);
        $this->assertSame('1', $this->subject->getNotes());
    }

    /**
     * @test
     */
    public function getAdditionalInformationsInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getAdditionalInformations());
    }

    /**
     * @test
     */
    public function setAdditionalInformationsWithBooleanResultsInString()
    {
        $this->subject->setAdditionalInformations(true);
        $this->assertSame('1', $this->subject->getAdditionalInformations());
    }

    /**
     * @test
     */
    public function getFacebookInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getFacebook());
    }

    /**
     * @test
     */
    public function setFacebookWithBooleanResultsInString()
    {
        $this->subject->setFacebook(true);
        $this->assertSame('1', $this->subject->getFacebook());
    }

    /**
     * @test
     */
    public function getTwitterInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTwitter());
    }

    /**
     * @test
     */
    public function setTwitterWithBooleanResultsInString()
    {
        $this->subject->setTwitter(true);
        $this->assertSame('1', $this->subject->getTwitter());
    }

    /**
     * @test
     */
    public function getGoogleInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getGoogle());
    }

    /**
     * @test
     */
    public function setGoogleWithBooleanResultsInString()
    {
        $this->subject->setGoogle(true);
        $this->assertSame('1', $this->subject->getGoogle());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        $this->assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getHolderInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getHolder());
    }

    /**
     * @test
     */
    public function setHolderSetsHolder()
    {
        $instance = new Holder();
        $this->subject->setHolder($instance);

        $this->assertSame(
            $instance,
            $this->subject->getHolder()
        );
    }

    /**
     * @test
     */
    public function getTypesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getTypes()
        );
    }

    /**
     * @test
     */
    public function getProfileContentsInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getProfileContents()
        );
    }

    /**
     * @test
     */
    public function getCareFormsInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
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

        $this->assertSame(
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

        $this->assertSame(
            $objectStorage,
            $this->subject->getCareForms()
        );
    }

    /**
     * @test
     */
    public function getSchoolDistrictInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getSchoolDistrict());
    }

    /**
     * @test
     */
    public function setSchoolDistrictSetsSchoolDistrict()
    {
        $instance = new SchoolDistrict();
        $this->subject->setSchoolDistrict($instance);

        $this->assertSame(
            $instance,
            $this->subject->getSchoolDistrict()
        );
    }
}
