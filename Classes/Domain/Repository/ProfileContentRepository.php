<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository;

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

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
