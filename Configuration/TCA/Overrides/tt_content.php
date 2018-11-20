<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.schooldirectory',
    'List',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.list.title'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.schooldirectory',
    'Search',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.search.title'
);
