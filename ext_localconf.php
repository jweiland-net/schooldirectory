<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'JWeiland.schooldirectory',
        'List',
        [
            'School' => 'list, show, search',
            'Ajax' => 'renderType, renderCareForm, renderProfile'
        ],
        // non-cacheable actions
        [
            'School' => 'list, search',
            'Ajax' => 'renderType, renderCareForm, renderProfile'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'JWeiland.schooldirectory',
        'Search',
        [
            'District' => 'search, list'
        ],
        // non-cacheable actions
        [
            'District' => 'list'
        ]
    );
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'extensions-schooldirectory-plugin-list',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:schooldirectory/Resources/Public/Icons/tx_schooldirectory_domain_model_school.svg']
    );

    // add schooldirectory plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:schooldirectory/Configuration/TSconfig/ContentElementWizard.txt">');

    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['schooldirectory_selector_renderTypeAction']
        = \JWeiland\Schooldirectory\Ajax\Selector::class . '::renderTypeAction';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['schooldirectory_selector_renderCareFormAction']
        = \JWeiland\Schooldirectory\Ajax\Selector::class . '::renderCareFormAction';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['schooldirectory_selector_renderProfileAction']
        = \JWeiland\Schooldirectory\Ajax\Selector::class . '::renderProfileAction';
});
