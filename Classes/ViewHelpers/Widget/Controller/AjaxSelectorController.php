<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\ViewHelpers\Widget\Controller;

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
    public function injectTypeRepository(TypeRepository $typeRepository): void
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param CareFormRepository $careFormRepository
     */
    public function injectCareFormRepository(CareFormRepository $careFormRepository): void
    {
        $this->careFormRepository = $careFormRepository;
    }

    /**
     * @param ProfileContentRepository $profileContentRepository
     */
    public function injectProfileContentRepository(ProfileContentRepository $profileContentRepository): void
    {
        $this->profileContentRepository = $profileContentRepository;
    }

    /**
     * Load index.html
     * Create selectboxes to search schools by given settings
     */
    public function indexAction(): void
    {
        $this->view->assign('types', $this->typeRepository->findAll());
        $this->view->assign('type', $this->widgetConfiguration['type']);
        $this->view->assign('careForm', $this->widgetConfiguration['careForm']);
        $this->view->assign('profile', $this->widgetConfiguration['profile']);
        $this->view->assign('pidOfSearchPage', $this->widgetConfiguration['pidOfSearchPage']);
    }
}
