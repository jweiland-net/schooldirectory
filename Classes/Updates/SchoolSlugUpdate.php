<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Updates;

use Doctrine\DBAL\Result;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\HiddenRestriction;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/*
 * Updater to fill empty slug columns of school records
 */
#[UpgradeWizard('schoolUpdateSlug')]
class SchoolSlugUpdate implements UpgradeWizardInterface
{
    protected string $tableName = 'tx_schooldirectory_domain_model_school';

    protected string $fieldName = 'path_segment';

    protected SlugHelper $slugHelper;

    /**
     * @var array<string, mixed>
     */
    protected array $slugCache = [];

    /**
     * Return the identifier for this wizard
     * This should be the same string as used in the ext_localconf class registration
     */
    public function getIdentifier(): string
    {
        return 'schoolUpdateSlug';
    }

    public function getTitle(): string
    {
        return 'Update Slug of school records';
    }

    public function getDescription(): string
    {
        return 'Update empty slug column "path_segment" of school records with an URI compatible version of the title';
    }

    public function updateNecessary(): bool
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeByType(HiddenRestriction::class);
        $amountOfRecordsWithEmptySlug = $queryBuilder
            ->count('*')
            ->from($this->tableName)
            ->where(
                $queryBuilder->expr()->or(
                    $queryBuilder->expr()->eq(
                        $this->fieldName,
                        $queryBuilder->createNamedParameter('', Connection::PARAM_STR)
                    ),
                    $queryBuilder->expr()->isNull(
                        $this->fieldName
                    )
                )
            )
            ->executeQuery()
            ->fetchOne();

        return (bool)$amountOfRecordsWithEmptySlug;
    }

    /**
     * Performs the accordant updates.
     *
     * @return bool Whether everything went smoothly or not
     */
    public function executeUpdate(): bool
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeByType(HiddenRestriction::class);
        $statement = $queryBuilder
            ->select('uid', 'title', 'path_segment')
            ->from($this->tableName)
            ->where(
                $queryBuilder->expr()->or(
                    $queryBuilder->expr()->eq(
                        $this->fieldName,
                        $queryBuilder->createNamedParameter('', Connection::PARAM_STR)
                    ),
                    $queryBuilder->expr()->isNull(
                        $this->fieldName
                    )
                )
            )
            ->executeQuery();

        $connection = $this->getConnectionPool()->getConnectionForTable($this->tableName);
        while ($recordToUpdate = $statement->fetchAssociative()) {
            if ((string)$recordToUpdate['title'] !== '') {
                $slug = $this->getSlugHelper()->sanitize((string)$recordToUpdate['title']);
                $connection->update(
                    $this->tableName,
                    [
                        $this->fieldName => $this->getUniqueValue(
                            (int)$recordToUpdate['uid'],
                            $slug
                        ),
                    ],
                    [
                        'uid' => (int)$recordToUpdate['uid'],
                    ]
                );
            }
        }

        return true;
    }

    protected function getUniqueValue(int $uid, string $slug): string
    {
        $result = $this->getUniqueSlugStatement($uid, $slug);
        $counter = $this->slugCache[$slug] ?? 1;
        while ($result->fetchAssociative()) {
            $newSlug = $slug . '-' . $counter;
            // Get a new result with the updated slug
            $result = $this->getUniqueSlugStatement($uid, $newSlug);

            // Do not cache every slug, because of memory consumption. I think 5 is a good value to start caching.
            if ($counter > 5) {
                $this->slugCache[$slug] = $counter;
            }

            $counter++;
        }

        return $newSlug ?? $slug;
    }

    protected function getUniqueSlugStatement(int $uid, string $slug): Result
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        return $queryBuilder
            ->select('uid')
            ->from($this->tableName)
            ->where(
                $queryBuilder->expr()->eq(
                    $this->fieldName,
                    $queryBuilder->createPositionalParameter($slug, Connection::PARAM_STR)
                ),
                $queryBuilder->expr()->neq(
                    'uid',
                    $queryBuilder->createPositionalParameter($uid, Connection::PARAM_INT)
                )
            )
            ->executeQuery();
    }

    protected function getSlugHelper(): SlugHelper
    {
        return $this->slugHelper;
    }

    /**
     * @return string[]
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
