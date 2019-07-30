<?php
declare(strict_types=1);
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
     * injects controller
     *
     * @param AjaxSelectorController $controller
     * @return void
     */
    public function injectController(AjaxSelectorController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * @var bool
     */
    protected $ajaxWidget = true;

    /**
     * call the index action of the controller
     *
     * @param integer $type
     * @param integer $careForm
     * @param integer $profile
     * @param integer $pidOfSearchPage
     * @return string
     */
    public function render($type, $careForm, $profile, $pidOfSearchPage)
    {
        return $this->initiateSubRequest();
    }
}
