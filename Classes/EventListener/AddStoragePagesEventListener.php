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

class AddStoragePagesEventListener extends AbstractControllerEventListener
{
    /**
     * @var SchoolRepository
     */
    protected $schoolRepository;

    protected $allowedControllerActions = [
        'School' => [
            'list',
            'search',
        ],
    ];

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        if ($this->isValidRequest($event)) {
            $event->addFluidVariable(
                'storagePages',
                implode(',', $this->schoolRepository->getStoragePages())
            );
        }
    }
}
