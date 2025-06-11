<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Schooldirectory\Controller\DistrictController;
use JWeiland\Schooldirectory\Controller\SchoolController;
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
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
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
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );
});
