<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use JWeiland\Maps2\Tca\Maps2Registry;

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

$GLOBALS['TCA']['tx_schooldirectory_domain_model_school']['columns']['schooldirectory'] = [
    'config' => [
        'type' => 'category'
    ]
];

ExtensionManagementUtility::addToAllTCAtypes('tx_schooldirectory_domain_model_school', 'schooldirectory');

// Add tx_maps2_uid column to school table
if (ExtensionManagementUtility::isLoaded('maps2')) {
    Maps2Registry::getInstance()->add(
        'schooldirectory',
        'tx_schooldirectory_domain_model_school',
        [
            'addressColumns' => ['street', 'house_number', 'zip', 'city'],
            'defaultCountry' => 'Deutschland',
            'defaultStoragePid' => [
                'extKey' => 'schooldirectory',
                'property' => 'poiCollectionPid',
            ],
            'synchronizeColumns' => [
                [
                    'foreignColumnName' => 'title',
                    'poiCollectionColumnName' => 'title',
                ],
            ],
        ],
    );
}
