<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Schooldirectory\Controller\DistrictController;
use JWeiland\Schooldirectory\Controller\SchoolController;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    ExtensionUtility::configurePlugin(
        'Schooldirectory',
        'List',
        [
            SchoolController::class => 'list, show, search',
        ],
        // non-cacheable actions
        [
            SchoolController::class => 'list, search',
        ],
    );

    ExtensionUtility::configurePlugin(
        'Schooldirectory',
        'Search',
        [
            DistrictController::class => 'search, list',
        ],
        // non-cacheable actions
        [
            DistrictController::class => 'list',
        ],
    );

    $iconRegistry = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'extensions-schooldirectory-plugin-list',
        SvgIconProvider::class,
        ['source' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_school.svg']
    );

    // Add schooldirectory plugin to new element wizard
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:schooldirectory/Configuration/TSconfig/ContentElementWizard.tsconfig">'
    );
});
