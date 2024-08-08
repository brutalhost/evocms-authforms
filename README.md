# Authforms for Evolution CMS 3.1
Пакет добавляет базовые формы авторизации, регистрации и смены пароля на фронтенд.
Сделан на базе [eovcms-user](https://github.com/webber12/evocms-user).

## Установка

```
php artisan package:installrequire brutalhost/evocms-authforms
composer update
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
