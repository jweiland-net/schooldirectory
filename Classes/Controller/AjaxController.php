<?php
declare(strict_types = 1);
namespace JWeiland\Schooldirectory\Controller;

/*
 * This file is part of the maps2 project.
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
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * This controller contains ajax action methods to delivers various data to fill Selectboxes in FE.
 */
class AjaxController extends ActionController
{
    /**
     * Process request
     *
     * @return string
     * @throws \RuntimeException
     */
    public function renderTypeAction(): string
    {
        $typeRepository = $this->objectManager->get(TypeRepository::class);

        $result = [];
        $types = $typeRepository->findTypes();
        $result['types'] = [];
        if (is_array($types) && count($types)) {
            foreach ($types as $type) {
                $result['types'][] = [
                    'uid' => $type['uid'],
                    'title' => $type['title']
                ];
            }
            $result['error'] = false;
        } else {
            $result['error'] = true;
        }

        return json_encode($result);
    }

    /**
     * Process request
     *
     * @param int $schoolType
     * @return string
     */
    public function renderCareFormAction(int $schoolType): string
    {
        $careFormRepository = $this->objectManager->get(CareFormRepository::class);

        $result = [];
        $careForms = $careFormRepository->findByType($schoolType);
        $result['careForms'] = [];
        if (is_array($careForms) && count($careForms)) {
            foreach ($careForms as $careFormInfo) {
                $result['careForms'][] = [
                    'uid' => $careFormInfo['uid'],
                    'title' => $careFormInfo['title']
                ];
            }
            $result['error'] = false;
        } else {
            $result['error'] = true;
        }

        return json_encode($result);
    }

    /**
     * Process request
     *
     * @param int $schoolType
     * @param int $careForm
     * @return string
     */
    public function renderProfileAction(int $schoolType, int $careForm): string
    {
        $profileContentRepository = $this->objectManager->get(ProfileContentRepository::class);

        $result = [];
        $profiles = $profileContentRepository->findByTypeAndCareForm($schoolType, $careForm);
        $result['profile'] = [];
        if (is_array($profiles) && count($profiles)) {
            foreach ($profiles as $profileInfo) {
                $result['profiles'][] = [
                    'uid' => $profileInfo['uid'],
                    'title' => $profileInfo['title']
                ];
            }
            $result['error'] = false;
        } else {
            $result['error'] = true;
        }

        return json_encode($result);
    }
}
