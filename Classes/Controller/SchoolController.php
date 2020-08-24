<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Controller;

use JWeiland\Glossary2\Service\GlossaryService;
use JWeiland\Schooldirectory\Domain\Model\School;
use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Main controller to list and show school records.
 */
class SchoolController extends ActionController
{
    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    /**
     * @var PageRenderer
     */
    protected $pageRenderer;

    /**
     * @var GlossaryService
     */
    protected $glossaryService;

    public function __construct(SchoolRepository $schoolRepository, PageRenderer $pageRenderer, GlossaryService $glossaryService)
    {
        if (method_exists(get_parent_class($this), '__construct')) {
            parent::__construct();
        }
        $this->schoolRepository = $schoolRepository;
        $this->pageRenderer = $pageRenderer;
        $this->glossaryService = $glossaryService;
    }

    /**
     * Preprocessing of all actions
     */
    public function initializeAction(): void
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
     * Action list
     *
     * @param string|null $letter Show only records starting with this letter
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", param="letter", options={"minimum": 0, "maximum": 3})
     */
    public function listAction(?string $letter = null): void
    {
        if ($letter === null) {
            $schools = $this->schoolRepository->findAll();
        } else {
            $schools = $this->schoolRepository->findByStartingLetter($letter);
        }
        $this->view->assign('schools', $schools);
        $this->view->assign('glossar', $this->glossaryService->buildGlossary(
            $this->schoolRepository->getQueryBuilderToFindAllEntries(),
            [
                'extensionName' => 'schooldirectory',
                'pluginName' => 'schooldirectory',
                'controllerName' => 'School',
            ]
        ));
        $this->addAjax();
    }

    /**
     * Action show
     *
     * @param School $school
     */
    public function showAction(School $school): void
    {
        $this->view->assign('school', $school);
    }

    /**
     * Action search
     *
     * @param int $type
     * @param int $careForm
     * @param int $profile
     */
    public function searchAction(int $type = 0, int $careForm = 0, int $profile = 0): void
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
     */
    protected function addAjax(): void
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
