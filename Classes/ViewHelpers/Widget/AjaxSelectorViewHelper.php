<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\ViewHelpers\Widget;

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

    public function injectController(AjaxSelectorController $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * Change Widget to an ajax widget
     *
     * @var bool
     */
    protected $ajaxWidget = true;

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument(
            'type',
            'int',
            'School type to select for',
            false,
            0
        );
        $this->registerArgument(
            'careForm',
            'int',
            'School careform to select for',
            false,
            0
        );
        $this->registerArgument(
            'profile',
            'int',
            'Profile content for School to select for',
            false,
            0
        );
        $this->registerArgument(
            'pidOfSearchPage',
            'int',
            'PID with configured schooldirectory search plugin',
            false
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
