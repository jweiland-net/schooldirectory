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
 * Class SchoolRepository
 *
 * @package JWeiland\Schooldirectory\Domain\Repository
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
     * find all records starting with given letter
     *
     * @param string $letter
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByStartingLetter($letter)
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
     * get an array with available starting letters
     *
     * @return array
     */
    public function getStartingLetters()
    {
        $query = $this->createQuery();

        return $query->statement(
            '
			SELECT UPPER(LEFT(title, 1)) AS letter
			FROM tx_schooldirectory_domain_model_school
			WHERE 1=1' . BackendUtility::BEenableFields(
                'tx_schooldirectory_domain_model_school'
            ) . BackendUtility::deleteClause('tx_schooldirectory_domain_model_school') . '
			GROUP BY letter
			ORDER BY letter;
		'
        )->execute(true);
    }

    /**
     * search records
     *
     * @param integer $type
     * @param integer $careForm
     * @param integer $profile
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function searchSchools($type = 0, $careForm = 0, $profile = 0)
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
     * search records
     *
     * @param string $street
     * @param integer $number
     * @param string $letter
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function searchSchoolsByStreet($street, $number, $letter)
    {
        $query = $this->createQuery();
        $addWhere = [];
        $replacements = [];
        // add query for street
        $addWhere[] = 'AND tx_schooldirectory_domain_model_street.street LIKE ?';
        $replacements[] = $this->getUnifiedStreetname($street) . '%';
        // add query for number
        if (!empty($number)) {
            $addWhere[] = 'AND tx_schooldirectory_domain_model_street.number_from <= ?';
            $addWhere[] = 'AND tx_schooldirectory_domain_model_street.number_to >= ?';
            $replacements[] = $number;
            $replacements[] = $number;
        }
        // add query for letter
        if (!empty($letter)) {
            $addWhere[] = 'AND tx_schooldirectory_domain_model_street.letter_from <= ?';
            $addWhere[] = 'AND (tx_schooldirectory_domain_model_street.letter_to >= ? OR tx_schooldirectory_domain_model_street.letter_to = \'\')';
            $replacements[] = $letter;
            $replacements[] = $letter;
        }
        // @ToDo:
        // Ups: I have mapped district to schooldistrict
        // To solve that problem I have changed foreign_table of district in street-table to schooldistrict
        // Would be good to solve this, if we have a little bit more time
        // Ticket: #10124092
        return $query->statement(
            'SELECT tx_schooldirectory_domain_model_school.*
            FROM tx_schooldirectory_domain_model_school
            LEFT JOIN tx_schooldirectory_domain_model_street ON tx_schooldirectory_domain_model_street.district = tx_schooldirectory_domain_model_school.school_district
            LEFT JOIN tx_schooldirectory_school_type_mm ON tx_schooldirectory_school_type_mm.uid_local = tx_schooldirectory_domain_model_school.uid
            WHERE tx_schooldirectory_school_type_mm.uid_foreign = 1
            ' . implode(LF, $addWhere),
            $replacements
        )->execute();
    }

    /**
     * get unified street name
     * converts "Strasse" to "Str."
     *
     * @param $street
     * @return string
     */
    protected function getUnifiedStreetname($street)
    {
        $street = strtolower(trim($street));
        $street = str_replace(array('str.', 'strasse', 'straße'), 'str', $street);

        return $street;
    }
}
