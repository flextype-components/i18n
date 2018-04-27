<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\I18n;

class I18n
{
    /**
     * Dictionary
     *
     * @var array
     */
    public static $dictionary = [];

    /**
     * Add translation keys
     *
     * I18n::add('auth', 'ru', ['login' => 'Login', 'password' => 'Password']);
     *
     * @param  string $namespace  Namespace
     * @param  string $locale     Locale
     * @param  string $translates Translation keys and values to add
     * @return void
     */
    public static function add(string $namespace, string $locale, array $translates = []) : void
    {
        static::$dictionary[$namespace][$locale][] = $translates;
    }

    /**
     * Returns translation of a string. If no translation exists, the original
     * string will be returned. No parameters are replaced.
     *
     * $translated_string = I18n::find('login', 'auth', 'ru');
     *
     * @param  string $translate Translate to find
     * @param  string $namespace Namespace
     * @param  string $locale    Locale
     * @param  array  $values    Values to replace in the translated text
     * @return string
     */
    public static function find(string $translate, string $namespace, string $locale, array $values = []) : string
    {
        // Search current string to translate in the Dictionary
        if (isset(static::$dictionary[$namespace][$locale][$translate])) {
            $translate = static::$dictionary[$namespace][$locale][$translate];
            $translate = empty($values) ? $translate : strtr($translate, $values);
        } else {
            $translate = $translate;
        }

        // Return translation of a string
        return $translate;
    }
}

if ( ! function_exists('__')) {
    /**
     * Global Translation/Internationalization function.
     * Accepts an translation key and returns its translation for selected language.
     * If the given translation key is not available in the current dictionary the
     * translation key will be returned.
     *
     * // Display a translated message
     * echo __('login', 'auth', 'ru');
     *
     * // With parameter replacement
     * echo __('hello_username', 'auth', 'ru', [':username' => $username]);
     *
     * @param  string $translate Translate to find
     * @param  string $namespace Namespace
     * @param  string $locale    Locale
     * @param  array  $values    Values to replace in the translated text
     * @return string
     */
    function __(string $translate, string $namespace, string $locale, array $values = []) : string
    {
        return I18n::find($translate, $namespace, $locale, $values);
    }
}
