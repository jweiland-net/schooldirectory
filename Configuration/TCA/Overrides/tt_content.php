<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Schooldirectory',
    'List',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.list.title'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Schooldirectory',
    'Search',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.search.title'
);
