<?php
return [
    'frontend' => [
        'middleware-identifier' => [
            'target' => \JWeiland\Schooldirectory\Middleware\AjaxRequestMiddleware::class,
            'after' => [
                'typo3/cms-frontend/site',
            ],
        ],
    ],
];
