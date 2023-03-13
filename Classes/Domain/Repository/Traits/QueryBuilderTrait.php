<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository\Traits;

use JWeiland\Schooldirectory\Helper\OverlayHelper;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Trait to create QueryBuilder object which is pre-configured for overlay
 */
trait QueryBuilderTrait
{
    /**
     * @var OverlayHelper
     */
    protected $overlayHelper;

    public function injectOverlayHelper(OverlayHelper $overlayHelper): void
    {
        $this->overlayHelper = $overlayHelper;
    }

    protected function getQueryBuilderForTable(
        string $table,
        string $alias,
        array $storagePages,
        bool $useLangStrict = false
    ): QueryBuilder {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($table);
        $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));
        $queryBuilder
            ->from($table, $alias)
            ->andWhere(
                $queryBuilder->expr()->in(
                    'pid',
                    $queryBuilder->createNamedParameter($storagePages, Connection::PARAM_INT_ARRAY)
                )
            );

        $this->overlayHelper->addWhereForOverlay($queryBuilder, $table, $alias, $useLangStrict);

        return $queryBuilder;
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
