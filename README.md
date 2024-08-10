# Authforms for Evolution CMS 3.1
Пакет добавляет базовые формы авторизации, регистрации и смены пароля на фронтенд.
Сделано на базе [eovcms-user](https://github.com/webber12/evocms-user).

### Преимущества

- Легко модифицировать кастомную обработку форм, "под капотом" evocms-user
- Blade шаблоны в папке views/authforms
- Тонкая настройка поведения (мгновенная активация при регистрации, отправка письма для подтверждения аккаунта и т.д.)
- Назначение групп, ролей в конфиге
- Локализация ru, en

### Скриншоты

![Вход](https://github.com/user-attachments/assets/ba8bb1bd-357b-42c5-8f9a-53a38a90cf31)
![Регистрация](https://github.com/user-attachments/assets/04940fec-b896-4972-b90a-cc53a019bb31)
![Восстановление пароля](https://github.com/user-attachments/assets/beb42705-fdf8-4bca-af38-70151d90e4cd)


## Установка

```
cd core
composer update
php artisan package:installrequire brutalhost/evocms-authforms "*"
php artisan vendor:publish --provider="EvolutionCMS\EvoUser\EvoUserServiceProvider"
php artisan vendor:publish --provider="EvolutionCMS\Authforms\AuthformsServiceProvider"
php artisan authforms:redirect-doc
```

Создадутся следующие файлы:
```
📄 core/custom/config/authforms.php
📄 core/custom/evocms-user/configs/evouser.php.authforms-example
📁 views/authforms
✅ AuthForms Reset Password - документ в админ-панели
```

## Настройка

### 📄 core/custom/evocms-user/configs/evouser.php.authforms-example
Файл содержит конфиг для evocms-user. Чтобы сделать его активным, переименуйте в `evouser.php`.

### 📄 core/custom/config/authforms.php
Задайте id сгенерированного документа ✅ AuthForms Reset Password:
```php
"RegisterVerifyUserPageId" => 123, // ID ✅ AuthForms Reset Password
"ResetPasswordPageId" => 123, // ID ✅ AuthForms Reset Password
```

Здесь указать роли и группы, присваиваемые пользователю при регистрации:
```php
'RegisterUserWithRole' => 5,
'RegisterUserWithUserGroups' => [1],
```

### 📁 views/authforms
Содержит blade файлы пакета, рассчитано на самостоятельную модификацию.

### ✅ AuthForms Reset Password
Документ обеспечивает совместимость с пакетом evocms-user. Требуется для восстановления пароля, верификации пользователя.

## Маршруты

Формируются по шаблону `/[префикс_из_конфига]/login[суффикс_для_дружественных_url]`

- `[префикс_из_конфига]` - config/authforms.php -> url_prefix
- `[суффикс_для_дружественных_url]` - Конфигурация сайта -> Дружественные URL -> Суффикс для дружественных URL: [(friendly_url_suffix)]

### Маршруты по умолчанию

- /login.html
- /register.html
- /reset_password.html

## Logout
Чтобы `evocms-user` обрабатывал выход из аккаунта - добавьте в BaseController вызов сервиса этого пакета:
```php
<?php

namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\TemplateController;

class BaseController extends TemplateController
{
    public $data = [];

    public function process()
    {
        $currentUser = app('evouser')->do('user', ['web']);
        $this->data['user'] = $currentUser === null ? null :  app('evouser')->do('ProfileInfo', [ 'user' => $currentUser ]);
        $this->setData();
        $this->addViewData($this->data);
    }

    public function setData()
    {
        /**
         * этот метод будем вызывать в других контроллерах
         * и именно в нём будем задавать значения для
         * переменной $data
         */
    }
}
```

При указании GET параметра `/?logout` будет происходить выход из аккаунта.
