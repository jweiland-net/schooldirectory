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

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main Repository to find various types of schools
 */
class SchoolRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * Find all records starting with given letter
     *
     * @param string $letter
     * @return QueryResultInterface
     */
    public function findByStartingLetter(string $letter): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraint = [];
        if ($letter == '0-9') {
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

        return $query->matching($query->logicalOr($constraint))->execute();
    }

    /**
     * Get an array with available starting letters
     *
     * @return array
     */
    public function getStartingLetters(): array
    {
        /** @var Query $query */
        $query = $this->createQuery();

        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_schooldirectory_domain_model_school');
        $queryBuilder
            ->selectLiteral('UPPER(LEFT(title, 1)) AS letter')
            ->from('tx_schooldirectory_domain_model_school')
            ->add('groupBy', 'letter')
            ->add('orderBy', 'letter');

        return $query->statement($queryBuilder)->execute(true);
    }

    /**
     * Search for school records
     *
     * @param int $type
     * @param int $careForm
     * @param int $profile
     * @return QueryResultInterface
     */
    public function searchSchools(int $type = 0, int $careForm = 0, int $profile = 0): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraint = [];
        if (!empty($type)) {
            $constraint[] = $query->equals('types.uid', $type);
        }
        if (!empty($careForm)) {
            $constraint[] = $query->equals('careForms.uid', $careForm);
        }
        if (!empty($profile)) {
            $constraint[] = $query->equals('profileContents.uid', $profile);
        }
        // there must be at least one constraint
        if (count($constraint)) {
            return $query->matching(
                $query->logicalAnd($constraint)
            )->execute();
        }
        return $this->findAll();
    }

    /**
     * search for school records by school type
     *
     * @param string $street
     * @param int $number
     * @param string $letter
     * @return QueryResultInterface
     */
    public function searchSchoolsByStreet(string $street, int $number, string $letter): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraints = [];
        $constraints[] = $query->equals('types.uid', 1);

        // add query for street
        $constraints[] = $query->like('schoolDistrict.streets.street', $this->sanitizeStreetName($street) . '%');

        // add query for number
        if (!empty($number)) {
            $constraints[] = $query->lessThanOrEqual('schoolDistrict.streets.numberFrom', $number);
            $constraints[] = $query->greaterThanOrEqual('schoolDistrict.streets.numberTo', $number);
        }

        // add query for letter
        if (!empty($letter)) {
            $constraints[] = $query->lessThanOrEqual('schoolDistrict.streets.letterFrom', $letter);

            $orConstraint = [];
            $orConstraint[] = $query->greaterThanOrEqual('schoolDistrict.streets.letterTo', $letter);
            $orConstraint[] = $query->equals('schoolDistrict.streets.letterTo', '');

            $constraints[] = $query->logicalOr($orConstraint);
        }

        return $query->matching($query->logicalAnd($constraints))->execute();
    }

    /**
     * Sanitize street name
     * Converts f.e. "Strasse" to "Str."
     *
     * @param string $street
     * @return string
     */
    protected function sanitizeStreetName(string $street): string
    {
        $street = strtolower(trim($street));
        $street = str_replace(['str.', 'strasse', 'straße'], 'str', $street);

        return $street;
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
