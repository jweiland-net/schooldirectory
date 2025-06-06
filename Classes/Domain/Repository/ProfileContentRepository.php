<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository;

use JWeiland\Schooldirectory\Domain\Model\ProfileContent;
use JWeiland\Schooldirectory\Domain\Repository\Traits\QueryBuilderTrait;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to find profile content by a given school type and careform
 *
 * @extends Repository<ProfileContent>
 */
class ProfileContentRepository extends Repository
{
    use QueryBuilderTrait;

    /**
     * @param int[] $storagePages List of storage page UIDs
     *
     * @return array<int, array<string, mixed>> Array of profile content DB rows
     */
    public function findByTypeAndCareForm(int $type, int $careForm, array $storagePages): array
    {
        $queryBuilder = $this->getQueryBuilderForTable(
            'tx_schooldirectory_domain_model_profilecontent',
            'pc',
            $storagePages
        );

        $statement = $queryBuilder
            ->selectLiteral('DISTINCT pc.*')
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

        $profileRecords = [];
        while ($profileRecord = $statement->fetch()) {
            $profileRecords[] = $profileRecord;
        }

        return $profileRecords;
    }
}
