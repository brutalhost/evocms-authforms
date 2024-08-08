# Authforms for Evolution CMS 3.1
Пакет добавляет базовые формы авторизации, регистрации и смены пароля на фронтенд.
Сделано на базе [eovcms-user](https://github.com/webber12/evocms-user).

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

Что у вас должно появиться после этих команд:
```
📄 core/custom/config/authforms.php
📄 core/custom/evocms-user/configs/evouser.php.authforms-example
📁 views/authforms
✅ AuthForms Reset Password - документ в админ-панели
```

## Настройка

### 📄 core/custom/evocms-user/configs/evouser.php.authforms-example
Файл содержит конфиг для evocms-user. Переименуйте его в `evouser.php`, чтобы активировать.

### 📄 core/custom/config/authforms.php
В этих полях задайте id сгенерированного документа ✅ AuthForms Reset Password:
```php
"RegisterVerifyUserPageId" => 123, // ID ✅ AuthForms Reset Password
"ResetPasswordPageId" => 123, // ID ✅ AuthForms Reset Password
```

### 📁 views/authforms
Содержит все blade файлы пакета, рассчитано на самостоятельную модификацию.

### ✅ AuthForms Reset Password
Документ обеспечивает совместимость с пакетом evocms-user, не удаляйте его.

## Logout
Чтобы `evocms-user` также обрабатывал выход из аккаунта - сформируйте BaseController подобным образом, в нём обязательно должен быть вызов `app('evouser')->do('user', ['web'])`:
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

Теперь если добавить GET параметр `/?logout` к любому маршруту, унаследованному от контроллера, будет происходить выход из аккаунта.
