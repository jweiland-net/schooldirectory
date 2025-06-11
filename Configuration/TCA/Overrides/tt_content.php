<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    'Schooldirectory',
    'List',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.list.title',
    'extensions-schooldirectory-plugin-list',
    'plugins',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.list.description',
);

ExtensionUtility::registerPlugin(
    'Schooldirectory',
    'Search',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.search.title',
    'extensions-schooldirectory-plugin-list',
    'plugins',
    'LLL:EXT:schooldirectory/Resources/Private/Language/locallang_db.xlf:plugin.search.description',
);
