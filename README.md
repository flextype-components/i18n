# I18n Component
![version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg?style=flat-square "Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/flextype-components/i18n/blob/master/LICENSE)

I18n Component for messages internationalization of your application.

### Installation

```
composer require flextype-components/i18n
```

### Usage

```php
use Flextype\Component\I18n\I18n;
```

Add translation keys
```php
I18n::add('auth', 'ru', ['login' => 'Login', 'password' => 'Password']);
```

Returns translation of a string. If no translation exists, the original string will be returned. No parameters are replaced.
```php
$translated_string = I18n::find('login', 'auth', 'ru');
```

Global Translation/Internationalization function.
Accepts an translation key and returns its translation for selected language.
If the given translation key is not available in the current dictionary the translation key will be returned.
```php
// Display a translated message
echo __('login', 'auth', 'ru');

// With parameter replacement
echo __('hello_username', 'auth', 'ru', [':username' => $username]);
```

## License
See [LICENSE](https://github.com/flextype-components/i18n/blob/master/LICENSE)
