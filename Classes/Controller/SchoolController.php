<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Controller;

use JWeiland\Schooldirectory\Domain\Model\School;
use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use JWeiland\Schooldirectory\Event\PostProcessFluidVariablesEvent;
use TYPO3\CMS\Extbase\Annotation as Extbase;
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

    public function injectSchoolRepository(SchoolRepository $schoolRepository): void
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function injectPageRenderer(PageRenderer $pageRenderer): void
    {
        $this->pageRenderer = $pageRenderer;
    }

    /**
     * @param string $letter Show only records starting with this letter
     * @Extbase\Validate("StringLength", param="letter", options={"minimum": 0, "maximum": 3})
     */
    public function listAction(string $letter = ''): void
    {
        if ($letter === '') {
            $schools = $this->schoolRepository->findAll();
        } else {
            $schools = $this->schoolRepository->findByStartingLetter($letter);
        }

        $this->postProcessAndAssignFluidVariables([
            'schools' => $schools,
            'letter' => $letter,
        ]);
    }

    public function showAction(School $school, string $letter = ''): void
    {
        $this->postProcessAndAssignFluidVariables([
            'school' => $school,
            'letter' => $letter,
        ]);
    }

    public function searchAction(int $type = 0, int $careForm = 0, int $profile = 0): void
    {
        $schools = $this->schoolRepository->searchSchools($type, $careForm, $profile);
        $this->postProcessAndAssignFluidVariables([
            'schools' => $schools,
            'type' => $type,
            'careForm' => $careForm,
            'profile' => $profile,
        ]);
    }

    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
