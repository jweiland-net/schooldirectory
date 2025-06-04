<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Schooldirectory',
        'List',
        [
            \JWeiland\Schooldirectory\Controller\SchoolController::class => 'list, show, search',
        ],
        // non-cacheable actions
        [
            \JWeiland\Schooldirectory\Controller\SchoolController::class => 'list, search',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Schooldirectory',
        'Search',
        [
            \JWeiland\Schooldirectory\Controller\DistrictController::class => 'search, list',
        ],
        // non-cacheable actions
        [
            \JWeiland\Schooldirectory\Controller\DistrictController::class => 'list',
        ]
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'extensions-schooldirectory-plugin-list',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_school.svg']
    );

    // Add schooldirectory plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:schooldirectory/Configuration/TSconfig/ContentElementWizard.tsconfig">'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['schoolUpdateSlug']
        = \JWeiland\Schooldirectory\Updater\SchoolSlugUpdater::class;
});
