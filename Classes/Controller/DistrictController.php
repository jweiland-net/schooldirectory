<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Controller;

use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use JWeiland\Schooldirectory\Event\PostProcessFluidVariablesEvent;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller to search and list districts
 */
class DistrictController extends ActionController
{
    protected SchoolRepository $schoolRepository;

    public function injectSchoolRepository(SchoolRepository $schoolRepository): void
    {
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * This action shows the search form
     */
    public function searchAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * This action shows the search results in list form
     *
     * @Extbase\Validate("NotEmpty", param="street")
     * @Extbase\Validate("NotEmpty", param="number")
     * @Extbase\Validate("Integer", param="number")
     */
    public function listAction(string $street, int $number, string $letter = ''): ResponseInterface
    {
        debug('here');die;
        $schools = $this->schoolRepository->searchSchoolsByStreet($street, $number, $letter);

        $this->postProcessAndAssignFluidVariables([
            'schools' => $schools,
        ]);

        return $this->htmlResponse();
    }

    /**
     * @param array<string, mixed> $variables
     */
    protected function postProcessAndAssignFluidVariables(array $variables = []): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                $variables
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }
}
