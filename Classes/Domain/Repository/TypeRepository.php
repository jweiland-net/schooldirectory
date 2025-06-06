<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository;

use JWeiland\Schooldirectory\Domain\Model\Type;
use JWeiland\Schooldirectory\Domain\Repository\Traits\QueryBuilderTrait;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository to find all school types
 *
 * @extends Repository<Type>
 */
class TypeRepository extends Repository
{
    use QueryBuilderTrait;

    /**
     * @param array<int, int> $storagePages
     * @return array<int, mixed>
     */
    public function findAllByStoragePages(array $storagePages): array
    {
        $queryBuilder = $this->getQueryBuilderForTable(
            'tx_schooldirectory_domain_model_type',
            't',
            $storagePages
        );

        $statement = $queryBuilder
            ->select('*')
            ->execute();

        $typeRecords = [];
        while ($typeRecord = $statement->fetch()) {
            $typeRecords[] = $typeRecord;
        }

        return $typeRecords;
    }
}
