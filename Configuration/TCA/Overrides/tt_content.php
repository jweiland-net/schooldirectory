<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
