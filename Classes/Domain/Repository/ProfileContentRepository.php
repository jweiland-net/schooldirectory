<?php
declare(strict_types = 1);
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
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to find profile content by a given school type and careform
 */
class ProfileContentRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * find profile by given care form
     *
     * @param int $type
     * @param int $careForm
     * @return array
     */
    public function findByTypeAndCareForm(int $type, int $careForm): array
    {
        /** @var Query $query */
        $query = $this->createQuery();

        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_schooldirectory_domain_model_profilecontent');
        $queryBuilder
            ->selectLiteral('DISTINCT pc.uid, pc.title')
            ->from('tx_schooldirectory_domain_model_profilecontent', 'pc')
            ->leftJoin(
                'pc',
                'tx_schooldirectory_school_profilecontent_mm',
                'spc_mm',
                $queryBuilder->expr()->eq(
                    'pc.uid',
                    $queryBuilder->quoteIdentifier('spc_mm.uid_foreign')
                )
            )
            ->leftJoin(
                'spc_mm',
                'tx_schooldirectory_domain_model_school',
                's',
                $queryBuilder->expr()->eq(
                    'spc_mm.uid_local',
                    $queryBuilder->quoteIdentifier('s.uid')
                )
            )
            ->leftJoin(
                's',
                'tx_schooldirectory_school_type_mm',
                'st_mm',
                $queryBuilder->expr()->eq(
                    's.uid',
                    $queryBuilder->quoteIdentifier('st_mm.uid_local')
                )
            )
            ->leftJoin(
                's',
                'tx_schooldirectory_school_careform_mm',
                'sc_mm',
                $queryBuilder->expr()->eq(
                    's.uid',
                    $queryBuilder->quoteIdentifier('sc_mm.uid_local')
                )
            )
            ->where(
                $queryBuilder->expr()->eq(
                    'st_mm.uid_foreign',
                    $queryBuilder->createNamedParameter($type, \PDO::PARAM_INT)
                )
            )
            ->andWhere(
                $queryBuilder->expr()->eq(
                    'sc_mm.uid_foreign',
                    $queryBuilder->createNamedParameter($careForm, \PDO::PARAM_INT)
                )
            )
            ->orderBy('pc.title', 'ASC')
            ->execute();

        return $query->statement($queryBuilder)->execute(true);
    }

    /**
     * Get TYPO3s Connection Pool
     *
     * @return ConnectionPool
     */
    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
