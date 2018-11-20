<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'schooldirectory',
    'tx_schooldirectory_domain_model_school',
    'category'
);

// Add tx_maps2_uid column to school table
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
    \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
        'schooldirectory',
        'tx_schooldirectory_domain_model_school',
        [
            'addressColumns' => ['street', 'house_number', 'zip', 'city'],
            'defaultCountry' => 'Deutschland',
            'defaultStoragePid' => [
                'extKey' => 'schooldirectory',
                'property' => 'poiCollectionPid'
            ],
            'synchronizeColumns' => [
                [
                    'foreignColumnName' => 'title',
                    'poiCollectionColumnName' => 'title'
                ]
            ]
        ]
    );
}
