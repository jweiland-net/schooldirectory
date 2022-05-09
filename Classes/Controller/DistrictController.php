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

/**
 * Controller to search and list districts
 */
class DistrictController extends AbstractController
{
    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    public function injectSchoolRepository(SchoolRepository $schoolRepository): void
    {
        $this->schoolRepository = $schoolRepository;
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
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty", param="street")
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty", param="number")
     * @TYPO3\CMS\Extbase\Annotation\Validate("Integer", param="number")
     */
    public function listAction(string $street, int $number, string $letter = ''): void
    {
        $schools = $this->schoolRepository->searchSchoolsByStreet($street, $number, $letter);

        // I know, it's nasty, but as long as we have SQL Statements in Repository, we can't change that
        $amountOfSchools = 0;
        foreach ($schools as $school) {
            $amountOfSchools++;
        }

        $this->postProcessAndAssignFluidVariables([
            'schools' => $schools,
            'amountOfSchools' => $amountOfSchools
        ]);
    }
}
