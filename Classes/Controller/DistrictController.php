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

use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class DistrictController
 *
 * @package JWeiland\Schooldirectory\Controller
 */
class DistrictController extends ActionController
{
    /**
     * schoolRepository
     *
     * @var SchoolRepository
     */
    protected $schoolRepository;

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
    }

    /**
     * action search
     * This action shows the search form
     *
     * @return void
     */
    public function searchAction()
    {
    }

    /**
     * action list
     * This action shows the search results in list form
     *
     * @param string $street
     * @param integer $number
     * @param string $letter
     * @return void
     */
    public function listAction($street, $number, $letter = '')
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
