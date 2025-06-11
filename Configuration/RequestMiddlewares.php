<?php

/*
 * This file is part of the package jweiland/schooldirectory.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Schooldirectory\Middleware\AjaxRequestMiddleware;

return [
    'frontend' => [
        'middleware-identifier' => [
            'target' => AjaxRequestMiddleware::class,
            'after' => [
                'typo3/cms-frontend/site',
            ],
        ],
    ],
];
