<?php
declare(strict_types=1);
namespace JWeiland\Schooldirectory\Domain\Repository;

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

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to find careforms by a given school type
 */
class CareFormRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * find careforms by given school type
     *
     * @param integer $type
     * @return array
     */
    public function findByType($type)
    {
        $query = $this->createQuery();

        return $query->statement(
            '
			SELECT DISTINCT tx_schooldirectory_domain_model_careform.uid, tx_schooldirectory_domain_model_careform.title
			FROM tx_schooldirectory_domain_model_careform

			LEFT JOIN tx_schooldirectory_school_careform_mm
			ON tx_schooldirectory_domain_model_careform.uid = tx_schooldirectory_school_careform_mm.uid_foreign

			LEFT JOIN tx_schooldirectory_domain_model_school
			ON tx_schooldirectory_school_careform_mm.uid_local = tx_schooldirectory_domain_model_school.uid

			LEFT JOIN tx_schooldirectory_school_type_mm
			ON tx_schooldirectory_domain_model_school.uid = tx_schooldirectory_school_type_mm.uid_local

			WHERE tx_schooldirectory_school_type_mm.uid_foreign = ?' . BackendUtility::BEenableFields(
                'tx_schooldirectory_domain_model_careform'
            ) . BackendUtility::deleteClause(
                'tx_schooldirectory_domain_model_careform'
            ) . BackendUtility::BEenableFields('tx_schooldirectory_domain_model_school') . BackendUtility::deleteClause(
                'tx_schooldirectory_domain_model_school'
            ) . '
			ORDER BY tx_schooldirectory_domain_model_careform.title ASC
		',
            [
                $type
            ]
        )->execute(true);
    }
}
