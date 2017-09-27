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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class TypeRepository
 *
 * @package JWeiland\Schooldirectory\Domain\Repository
 */
class TypeRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * get all types as array
     *
     * @return array
     */
    public function findTypes()
    {
        $query = $this->createQuery();

        return $query->execute(true);
    }
}
