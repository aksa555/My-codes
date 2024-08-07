<?php

return [
    /* --------------------------------------------------------------------------------------------
     * Menu Configuration
     * --------------------------------------------------------------------------------------------
     */
    'menu_filters' => [
        CodeCoz\AimAdmin\MenuBuilder\Filters\HrefFilter::class,
        CodeCoz\AimAdmin\MenuBuilder\Filters\ActiveFilter::class,
        CodeCoz\AimAdmin\MenuBuilder\Filters\ClassesFilter::class,
    ],

    'menu' => [
        // Navbar items:
        [
            'text' => 'Dashboard',
            'icon' => 'ti ti-home',
            'url' => 'dashboard'
        ],

        [
            'controller' => \CodeCoz\AimAdmin\Http\Controllers\QuizController::class,
            'user_model' => \App\Models\Quiz::class,
            // 'url' => 'quiz.list',
            'text' => 'Quiz',
            'url' => 'http://127.0.0.1:8000/quiz/',
            'icon' => 'ti ti-help',
            'active' => ['Quiz'],
            'submenu' => [
                [
                    'text' => 'Quiz info',
                    // 'url' => '#',
                    'url' => 'http://127.0.0.1:8000/quiz/',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],

        [
            'text' => 'Support 2',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support2'],
            'submenu' => [
                [
                    'text' => 'Ticket',
                    'url' => 'support2',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],

        [
            'text' => 'Support 3',
            'url' => '#',
            'icon' => 'ti ti-help',
            'active' => ['support3'],
            'submenu' => [
                [
                    'text' => 'Ticket',
                    'url' => 'support3',
                    'icon' => 'ti ti-article',
                ]
            ],
        ],

    ],

    /* --------------------------------------------------------------------------------------------
     * File Upload Configuration
     * --------------------------------------------------------------------------------------------
     */
    'upload_file_type' => ['png', 'jpg', 'bmp', 'pdf', 'doc', 'xls', 'ppt'],
    'upload_file_size' => 5 * 1024,

    /* --------------------------------------------------------------------------------------------
     * Auth Configuration
     * --------------------------------------------------------------------------------------------
     */
    'auth' => [
        'controller' => \CodeCoz\AimAdmin\Http\Controllers\Auth\LoginController::class,
        'user_model' => \App\Models\User::class,
        'url' => 'login',
        'logout_url' => 'logout',
        'profile_url' => 'profile',
        'middleware' => ['guest', 'web'],
    ],
    'registration' => [
        'controller' => \CodeCoz\AimAdmin\Http\Controllers\Auth\RegistrationController::class,
        'fields' => [
            'number' => 'id',
            'text' => 'full_name'
        ]
    ],
    'back_to_top' => true,
    'layout_class' => [
        'body' => 'text-sm',
        'brand' => '',
        'sidebar' => '',
        'navbar' => '',
        'footer' => '',
    ],
    'footer_text' => 'Anything you want',
];
