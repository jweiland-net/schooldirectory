<?php
declare(strict_types = 1);
namespace JWeiland\Schooldirectory\ViewHelpers\Widget;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\Schooldirectory\ViewHelpers\Widget\Controller\AjaxSelectorController;
use TYPO3\CMS\Extbase\Mvc\ResponseInterface;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper;

/**
 * A ViewHelper with own template to show ajax-based selectboxes
 */
class AjaxSelectorViewHelper extends AbstractWidgetViewHelper
{
    /**
     * @var AjaxSelectorController
     */
    protected $controller;

    /**
     * @param AjaxSelectorController $controller
     */
    public function injectController(AjaxSelectorController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Change Widget to an ajax widget
     *
     * @var bool
     */
    protected $ajaxWidget = true;

    /**
     * Initialize arguments.
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument(
            'type',
            'int',
            'School type to select for',
            true
        );
        $this->registerArgument(
            'careForm',
            'int',
            'School careform to select for',
            true
        );
        $this->registerArgument(
            'profile',
            'int',
            'Profile content for School to select for',
            true
        );
        $this->registerArgument(
            'pidOfSearchPage',
            'int',
            'PID with configured schooldirectory search plugin',
            true
        );
    }

    /**
     * Call the index action of the controller
     *
     * @return ResponseInterface
     */
    public function render(): ResponseInterface
    {
        return $this->initiateSubRequest();
    }
}
