<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Controller;

use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller to search and list districts
 */
class DistrictController extends ActionController
{
    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    /**
     * @param SchoolRepository $schoolRepository
     */
    public function injectSchoolRepository(SchoolRepository $schoolRepository): void
    {
        $this->schoolRepository = $schoolRepository;
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
    }

    /**
     * This action shows the search form
     */
    public function searchAction(): void
    {
    }

    /**
     * This action shows the search results in list form
     *
     * @param string $street
     * @param int $number
     * @param string $letter
     */
    public function listAction(string $street, int $number, string $letter = ''): void
    {
        $schools = $this->schoolRepository->searchSchoolsByStreet($street, $number, $letter);
        // I know, it's nasty, but as long as we have SQL Statements in Repository, we can't change that
        $amountOfSchools = 0;
        foreach ($schools as $school) {
            $amountOfSchools++;
        }
        $this->view->assign('schools', $schools);
        $this->view->assign('amountOfSchools', $amountOfSchools);
    }
}
