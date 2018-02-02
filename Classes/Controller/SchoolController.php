<?php
declare(strict_types=1);
namespace JWeiland\Schooldirectory\Controller;

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

use JWeiland\Schooldirectory\Domain\Model\School;
use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class SchoolController
 *
 * @package JWeiland\Schooldirectory\Controller
 */
class SchoolController extends ActionController
{
    /**
     * schoolRepository
     *
     * @var SchoolRepository
     */
    protected $schoolRepository;

    /**
     * Page renderer
     *
     * @var PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var string
     */
    protected $letters = '0-9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';

    /**
     * injects schoolRepository
     *
     * @param SchoolRepository $schoolRepository
     * @return void
     */
    public function injectSchoolRepository(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * injects pageRenderer
     *
     * @param PageRenderer $pageRenderer
     * @return void
     */
    public function injectPageRenderer(PageRenderer $pageRenderer)
    {
        $this->pageRenderer = $pageRenderer;
    }

    /**
     * preprocessing of all actions
     *
     * @return void
     */
    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
        if (empty($this->settings['pidOfSearchPage'])) {
            $this->settings['pidOfSearchPage'] = null;
        }
    }

    /**
     * action list
     *
     * @param string $letter Show only records starting with this letter
     * @validate $letter String, StringLength(minimum=0,maximum=1)
     * @return void
     */
    public function listAction($letter = null)
    {
        if ($letter === null) {
            $schools = $this->schoolRepository->findAll();
        } else {
            $schools = $this->schoolRepository->findByStartingLetter($letter);
        }
        $this->view->assign('schools', $schools);
        $this->view->assign('glossar', $this->getGlossar());

        $this->addAjax();
    }

    /**
     * get an array with letters as keys for the glossar
     *
     * @return array Array with starting letters as keys
     */
    protected function getGlossar()
    {
        $glossar = [];
        $availableLetters = $this->schoolRepository->getStartingLetters();
        $possibleLetters = GeneralUtility::trimExplode(',', $this->letters);
        // add all letters which we have found in DB
        foreach ($availableLetters as $availableLetter) {
            if (MathUtility::canBeInterpretedAsInteger($availableLetter['letter'])) {
                $availableLetter['letter'] = '0-9';
            }
            // add only letters which are valid (do not add "§$%")
            if (array_search($availableLetter['letter'], $possibleLetters) !== false) {
                $glossar[$availableLetter['letter']] = true;
            }
        }
        // add all valid letters which are not set/found by previous foreach
        foreach ($possibleLetters as $possibleLetter) {
            if (!array_key_exists($possibleLetter, $glossar)) {
                $glossar[$possibleLetter] = false;
            }
        }
        ksort($glossar, SORT_STRING);

        return $glossar;
    }

    /**
     * action show
     *
     * @param School $school
     * @return void
     */
    public function showAction(School $school)
    {
        $this->view->assign('school', $school);
    }

    /**
     * action search
     *
     * @param integer $type
     * @param integer $careForm
     * @param integer $profile
     * @return void
     */
    public function searchAction($type = 0, $careForm = 0, $profile = 0)
    {
        $schools = $this->schoolRepository->searchSchools($type, $careForm, $profile);
        $this->view->assign('schools', $schools);
        $this->view->assign('type', $type);
        $this->view->assign('careForm', $careForm);
        $this->view->assign('profile', $profile);

        $this->addAjax();
    }

    /**
     * Adds ajax to action
     *
     * @return void
     */
    protected function addAjax()
    {
        $this->pageRenderer->addInlineSetting(
            'Schooldirectory',
            'ajaxRenderTypeAction',
            $this->getControllerContext()->getUriBuilder()
                ->reset()
                ->setTargetPageType(20180202)
                ->uriFor('renderType', [], 'Ajax')
        );

        $this->pageRenderer->addInlineSetting(
            'Schooldirectory',
            'ajaxRenderCareFormAction',
            $this->getControllerContext()->getUriBuilder()
                ->reset()
                ->setTargetPageType(20180202)
                ->uriFor('renderCareForm', [], 'Ajax')
        );

        $this->pageRenderer->addInlineSetting(
            'Schooldirectory',
            'ajaxRenderProfileAction',
            $this->getControllerContext()->getUriBuilder()
                ->reset()
                ->setTargetPageType(20180202)
                ->uriFor('renderProfile', [], 'Ajax')
        );
    }
}
