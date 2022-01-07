<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository;

/**
 * Repository to find CareForm records by a given school type
 */
class CareFormRepository extends AbstractRepository
{
    public function findByType(int $type, array $storagePages): array
    {
        $queryBuilder = $this->getQueryBuilderForTable(
            'tx_schooldirectory_domain_model_careform',
            'c',
            $storagePages
        );

        $statement = $queryBuilder
            ->selectLiteral('DISTINCT c.uid, c.title')
            ->leftJoin(
                'c',
                'tx_schooldirectory_school_careform_mm',
                'sc_mm',
                $queryBuilder->expr()->eq(
                    'c.uid',
                    $queryBuilder->quoteIdentifier('sc_mm.uid_foreign')
                )
            )
            ->leftJoin(
                'sc_mm',
                'tx_schooldirectory_domain_model_school',
                's',
                $queryBuilder->expr()->eq(
                    'sc_mm.uid_local',
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
            ->where(
                $queryBuilder->expr()->eq(
                    'st_mm.uid_foreign',
                    $queryBuilder->createNamedParameter($type, \PDO::PARAM_INT)
                )
            )
            ->orderBy('c.title', 'ASC')
            ->execute();

        $careFormRecords = [];
        while ($careFormRecord = $statement->fetch()) {
            $careFormRecords[] = $careFormRecord;
        }

        return $careFormRecords;
    }
}
