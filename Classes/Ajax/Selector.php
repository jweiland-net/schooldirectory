<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Ajax;

use JWeiland\Schooldirectory\Domain\Repository\CareFormRepository;
use JWeiland\Schooldirectory\Domain\Repository\ProfileContentRepository;
use JWeiland\Schooldirectory\Domain\Repository\TypeRepository;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * This class delivers various data to fill the Ajax-based Selectboxes in FE.
 */
class Selector
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
    }

    /**
     * Process request
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return Response
     * @throws \RuntimeException
     */
    public function renderTypeAction(ServerRequest $request, Response $response): Response
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

        $response->getBody()->write(json_encode($result));
        return $response;
    }

    /**
     * Process request
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return Response
     * @throws \RuntimeException
     */
    public function renderCareFormAction(ServerRequest $request, Response $response): Response
    {
        $careFormRepository = $this->objectManager->get(CareFormRepository::class);

        $result = [];
        $careForms = $careFormRepository->findByType((int)$request->getParsedBody()['schoolType']);
        $result['careForms'] = [];
        if (is_array($careForms) && count($careForms)) {
            foreach ($careForms as $careForm) {
                $result['careForms'][] = [
                    'uid' => $careForm['uid'],
                    'title' => $careForm['title']
                ];
            }
            $result['error'] = false;
        } else {
            $result['error'] = true;
        }

        $response->getBody()->write(json_encode($result));
        return $response;
    }

    /**
     * Process request
     *
     * @param ServerRequest $request
     * @param Response $response
     * @return Response
     * @throws \RuntimeException
     */
    public function renderProfileAction(ServerRequest $request, Response $response): Response
    {
        $profileContentRepository = $this->objectManager->get(ProfileContentRepository::class);

        $result = [];
        $profiles = $profileContentRepository->findByTypeAndCareForm(
            (int)$request->getParsedBody()['schoolType'],
            (int)$request->getParsedBody()['schoolCareForm']
        );
        $result['profile'] = [];
        if (is_array($profiles) && count($profiles)) {
            foreach ($profiles as $profile) {
                $result['profiles'][] = [
                    'uid' => $profile['uid'],
                    'title' => $profile['title']
                ];
            }
            $result['error'] = false;
        } else {
            $result['error'] = true;
        }

        $response->getBody()->write(json_encode($result));
        return $response;
    }
}
