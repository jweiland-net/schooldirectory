<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Schooldirectory\Controller\Traits;

/**
 * Trait to initialize the view in controllers.
 *
 * @property array $settings
 */
trait InitializeControllerTrait
{
    public function initializeAction(): void
    {
        // If this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
        if (empty($this->settings['pidOfSearchPage'])) {
            $this->settings['pidOfSearchPage'] = null;
        }
    }
}
