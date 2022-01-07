<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\EventListener;

use JWeiland\Schooldirectory\Domain\Repository\SchoolRepository;
use JWeiland\Schooldirectory\Event\PostProcessFluidVariablesEvent;
use JWeiland\Glossary2\Service\GlossaryService;

class AddGlossaryEventListener extends AbstractControllerEventListener
{
    /**
     * @var GlossaryService
     */
    protected $glossaryService;

    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    protected $allowedControllerActions = [
        'School' => [
            'list'
        ]
    ];

    public function __construct(GlossaryService $glossaryService, SchoolRepository $schoolRepository)
    {
        $this->glossaryService = $glossaryService;
        $this->schoolRepository = $schoolRepository;
    }

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $event->addFluidVariable(
                'glossar',
                $this->glossaryService->buildGlossary(
                    $this->schoolRepository->getQueryBuilderToFindAllEntries(),
                    [
                        'extensionName' => 'schooldirectory',
                        'pluginName' => 'list',
                        'controllerName' => 'School',
                        'column' => 'title'
                    ]
                )
            );
        }
    }
}
