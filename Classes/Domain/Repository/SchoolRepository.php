<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Domain\Repository;

use JWeiland\Schooldirectory\Domain\Model\School;
use JWeiland\Schooldirectory\Domain\Repository\Traits\QueryBuilderTrait;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main Repository to find various types of schools
 *
 * @extends Repository<School>
 */
class SchoolRepository extends Repository
{
    use QueryBuilderTrait;

    /**
     * @var array<non-empty-string, 'ASC'|'DESC'>
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @return array<int, int>
     */
    public function getStoragePages(): array
    {
        return $this->createQuery()->getQuerySettings()->getStoragePageIds();
    }

    /**
     * Find all records starting with given letter
     *
     * @return QueryResultInterface<int, School>
     * @throws InvalidQueryException
     */
    public function findByStartingLetter(string $letter): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraint = [];
        if ($letter === '0-9') {
            $constraint[] = $query->like('title', '0%');
            $constraint[] = $query->like('title', '1%');
            $constraint[] = $query->like('title', '2%');
            $constraint[] = $query->like('title', '3%');
            $constraint[] = $query->like('title', '4%');
            $constraint[] = $query->like('title', '5%');
            $constraint[] = $query->like('title', '6%');
            $constraint[] = $query->like('title', '7%');
            $constraint[] = $query->like('title', '8%');
            $constraint[] = $query->like('title', '9%');
        } else {
            $constraint[] = $query->like('title', $letter . '%');
        }

        return $query->matching($query->logicalOr(...$constraint))->execute();
    }

    /**
     * Search for school records
     *
     * @return QueryResultInterface<int, School>
     */
    public function searchSchools(int $type = 0, int $careForm = 0, int $profile = 0): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraint = [];
        if ($type !== 0) {
            $constraint[] = $query->equals('types.uid', $type);
        }

        if ($careForm !== 0) {
            $constraint[] = $query->equals('careForms.uid', $careForm);
        }

        if ($profile !== 0) {
            $constraint[] = $query->equals('profileContents.uid', $profile);
        }

        // there must be at least one constraint
        if ($constraint !== []) {
            return $query->matching(
                $query->logicalAnd(...$constraint)
            )->execute();
        }

        return $this->findAll();
    }

    /**
     * Search for school records by school type
     *
     * @return QueryResultInterface<int, School>
     * @throws InvalidQueryException
     */
    public function searchSchoolsByStreet(string $street, int $number, string $letter): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraints = [];
        $constraints[] = $query->equals('types.uid', 1);

        // add query for street
        $constraints[] = $query->like('schoolDistrict.streets.street', $this->sanitizeStreetName($street) . '%');

        // add query for number
        if ($number !== 0) {
            $constraints[] = $query->lessThanOrEqual('schoolDistrict.streets.numberFrom', $number);
            $constraints[] = $query->greaterThanOrEqual('schoolDistrict.streets.numberTo', $number);
        }

        // add query for letter
        if ($letter !== '') {
            $constraints[] = $query->lessThanOrEqual('schoolDistrict.streets.letterFrom', $letter);

            $orConstraint = [];
            $orConstraint[] = $query->greaterThanOrEqual('schoolDistrict.streets.letterTo', $letter);
            $orConstraint[] = $query->equals('schoolDistrict.streets.letterTo', '');

            $constraints[] = $query->logicalOr(...$orConstraint);
        }

        return $query->matching($query->logicalAnd(...$constraints))->execute();
    }

    /**
     * Sanitize street name
     * Converts f.e. "Strasse" to "Str."
     */
    protected function sanitizeStreetName(string $street): string
    {
        return str_replace(
            ['str.', 'strasse', 'straße'],
            'str',
            strtolower(trim($street))
        );
    }

    public function getQueryBuilderToFindAllEntries(): QueryBuilder
    {
        $table = 'tx_schooldirectory_domain_model_school';
        $query = $this->createQuery();
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($table);
        $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));

        // Do not set any SELECT, ORDER BY, GROUP BY statement. It will be set by glossary2 API
        $queryBuilder
            ->from($table)
            ->where(
                $queryBuilder->expr()->in(
                    'pid',
                    $queryBuilder->createNamedParameter(
                        $query->getQuerySettings()->getStoragePageIds(),
                        Connection::PARAM_INT_ARRAY
                    )
                )
            );

        return $queryBuilder;
    }
}
