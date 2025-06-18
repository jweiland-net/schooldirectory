<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Middleware;

use JWeiland\Schooldirectory\Domain\Repository\CareFormRepository;
use JWeiland\Schooldirectory\Domain\Repository\ProfileContentRepository;
use JWeiland\Schooldirectory\Domain\Repository\TypeRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Middleware to fill type, careForm and profile selectBoxes via Ajax Request
 */
class AjaxRequestMiddleware implements MiddlewareInterface
{
    protected CareFormRepository $careFormRepository;

    protected ProfileContentRepository $profileContentRepository;

    protected TypeRepository $typeRepository;

    protected PageRepository $pageRepository;

    public function __construct(
        CareFormRepository $careFormRepository,
        ProfileContentRepository $profileContentRepository,
        TypeRepository $typeRepository,
        PageRepository $pageRepository
    ) {
        $this->careFormRepository = $careFormRepository;
        $this->profileContentRepository = $profileContentRepository;
        $this->typeRepository = $typeRepository;
        $this->pageRepository = $pageRepository;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        parse_str(file_get_contents('php://input') ?: '', $postParameters);

        if (
            array_key_exists('ext', $postParameters)
            && array_key_exists('method', $postParameters)
            && array_key_exists('storagePages', $postParameters)
            && $postParameters['ext'] === 'schooldirectory'
        ) {
            $data = [];
            $storagePages = GeneralUtility::intExplode(',', $postParameters['storagePages']);
            switch ($postParameters['method']) {
                case 'getCareForms':
                    if (array_key_exists('type', $postParameters)) {
                        $data = $this->getCareFormRecords((int)$postParameters['type'], $storagePages);
                    }

                    break;
                case 'getProfiles':
                    if (
                        array_key_exists('type', $postParameters)
                        && array_key_exists('careForm', $postParameters)
                    ) {
                        $data = $this->getProfileRecords(
                            (int)$postParameters['type'],
                            (int)$postParameters['careForm'],
                            $storagePages
                        );
                    }

                    break;
                case 'getTypes':
                default:
                    $data = $this->getTypeRecords($storagePages);
            }

            return new JsonResponse([
                'success' => true,
                'data' => $data,
            ]);
        }

        return $handler->handle($request);
    }

    /**
     * @param array<int, int> $storagePages
     * @return array<int, array{uid: int, title: string}>
     */
    protected function getCareFormRecords(int $type, array $storagePages): array
    {
        return $this->overlayRecords(
            $this->careFormRepository->findByType($type, $storagePages),
            'tx_schooldirectory_domain_model_careform'
        );
    }

    /**
     * @param array<int, int> $storagePages
     * @return array<int, array{uid: int, title: string}>
     */
    protected function getProfileRecords(int $type, int $careForm, array $storagePages): array
    {
        return $this->overlayRecords(
            $this->profileContentRepository->findByTypeAndCareForm($type, $careForm, $storagePages),
            'tx_schooldirectory_domain_model_profilecontent'
        );
    }

    /**
     * @param array<int, int> $storagePages
     * @return array<int, array{uid: int, title: string}>
     */
    protected function getTypeRecords(array $storagePages): array
    {
        return $this->overlayRecords(
            $this->typeRepository->findAllByStoragePages($storagePages),
            'tx_schooldirectory_domain_model_type'
        );
    }

    /**
     * @param array<int, array<string, mixed>> $recordsToBeTranslated
     * @return array<int, array{uid: int, title: string}>
     */
    protected function overlayRecords(array $recordsToBeTranslated, string $table): array
    {
        $translatedRecords = [];
        foreach ($recordsToBeTranslated as $recordToBeTranslated) {
            $this->pageRepository->versionOL($table, $recordToBeTranslated);
            $recordToBeTranslated = $this->pageRepository->getLanguageOverlay($table, $recordToBeTranslated);
            $translatedRecords[] = [
                'uid' => (int)$recordToBeTranslated['uid'],
                'title' => $recordToBeTranslated['title'],
            ];
        }

        return $translatedRecords;
    }
}
