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
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\CMS\Core\Page\PageRenderer;

/**
 * Main controller to list and show school records.
 */
class SchoolController extends AbstractController
{
    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    /**
     * @var PageRenderer
     */
    protected $pageRenderer;

    public function __construct(
        SchoolRepository $schoolRepository,
        PageRenderer $pageRenderer,
        EventDispatcher $eventDispatcher
    ) {
        parent::__construct($eventDispatcher);

        $this->schoolRepository = $schoolRepository;
        $this->pageRenderer = $pageRenderer;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Action list
     *
     * @param string $letter Show only records starting with this letter
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", param="letter", options={"minimum": 0, "maximum": 3})
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
            'letter' => $letter
        ]);
    }

    /**
     * Action show
     *
     * @param School $school
     * @param string $letter
     */
    public function showAction(School $school, string $letter = ''): void
    {
        $this->postProcessAndAssignFluidVariables([
            'school' => $school,
            'letter' => $letter
        ]);
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
        $this->postProcessAndAssignFluidVariables([
            'schools' => $schools,
            'type' => $type,
            'careForm' => $careForm,
            'profile' => $profile,
        ]);
    }
}
