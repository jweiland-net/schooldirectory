<?php
declare(strict_types = 1);
namespace JWeiland\Schooldirectory\ViewHelpers\Widget\Controller;

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

use JWeiland\Schooldirectory\Domain\Repository\CareFormRepository;
use JWeiland\Schooldirectory\Domain\Repository\ProfileContentRepository;
use JWeiland\Schooldirectory\Domain\Repository\TypeRepository;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController;

/**
 * With this Ajax Widget controller we will fill the ajax based selectboxes in FE
 */
class AjaxSelectorController extends AbstractWidgetController
{
    /**
     * @var \JWeiland\Schooldirectory\Domain\Repository\TypeRepository
     */
    protected $typeRepository;

    /**
     * @var \JWeiland\Schooldirectory\Domain\Repository\CareFormRepository
     */
    protected $careFormRepository;

    /**
     * @var \JWeiland\Schooldirectory\Domain\Repository\ProfileContentRepository
     */
    protected $profileContentRepository;

    /**
     * @param TypeRepository $typeRepository
     */
    public function injectTypeRepository(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param CareFormRepository $careFormRepository
     */
    public function injectCareFormRepository(CareFormRepository $careFormRepository)
    {
        $this->careFormRepository = $careFormRepository;
    }

    /**
     * @param ProfileContentRepository $profileContentRepository
     */
    public function injectProfileContentRepository(ProfileContentRepository $profileContentRepository)
    {
        $this->profileContentRepository = $profileContentRepository;
    }

    /**
     * Load index.html
     * Create selectboxes to search schools by given settings
     */
    public function indexAction()
    {
        $this->view->assign('types', $this->typeRepository->findAll());
        $this->view->assign('type', $this->widgetConfiguration['type']);
        $this->view->assign('careForm', $this->widgetConfiguration['careForm']);
        $this->view->assign('profile', $this->widgetConfiguration['profile']);
        $this->view->assign('pidOfSearchPage', $this->widgetConfiguration['pidOfSearchPage']);
    }
}
