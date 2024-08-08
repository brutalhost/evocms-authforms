<?php

return [
    /*
     * При изменении префикса также отредактируйте псевдоним документа ✅ AuthForm Reset Password
     * */
    'url_prefix' => '', // site.com/url_prefix/login.html
    'friendly_url_suffix' => '.html',
    'footer_links' => [
        [
            // 'title' => 'На главную',
            'trans_key' => 'authforms::forms.to_home',

            // 'link' => 'https://github.com/',
            'docId' => 1
        ],
        [
            // 'title' => 'Политика конфиденциальности',
            'trans_key' => 'authforms::forms.privacy_policy',

            // 'link' => 'https://github.com/',
            'docId' => 1,
        ]
    ],

    'login' => [
        /*
         * active - добавляет ссылку в меню под формами
         * */
        'active' => true,
        'route' => 'authforms.pages.login',
    ],
    'register' => [
        'active' => true,
        'route' => 'authforms.pages.register',
        'verified_on_register' => false, // Влияет на текст успешной отправки формы, смотрите jQuery в конце шаблона
    ],
    'reset_password' => [
        /*
         * При отключении active также уберите статус публикации документа ✅ AuthForms Reset Password,
         * чтобы не срабатывала стандартная маршрутизация Evolution CMS
         * */
        'active' => true,
        /*
         * Этот route должен вести по маршруту документа ✅ AuthForms Reset Password
         * */
        'route' => 'authforms.pages.reset_password',
    ],

    'redirect_if_auth_to' => '/',


    /*
     * EvoUser
     * */
    "LogoutRedirectId" => 1,
    "AuthRedirectId" => 1,

    "RegisterVerifyUserPageId" => 9, // ID ✅ AuthForms Reset Password
    "ResetPasswordPageId" => 9, // ID ✅ AuthForms Reset Password

    'SendVerificationEmailAfterRegistration' => true,

    'RegisterUserWithRole' => 5,
    'RegisterUserWithUserGroups' => [1],

    'InstantAuthAfterRegistration' => false,
];
