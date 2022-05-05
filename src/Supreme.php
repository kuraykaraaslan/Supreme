<?php

namespace Kuraykaraaslan\Supreme;

use Google\Cloud\Translate\TranslateClient;
use Kuraykaraaslan\Supreme\Modals\Post;

/**
 * @see \Kuraykaraaslan\Supreme\Skeleton\SkeletonClass
 */
class Supreme
{

    /* Creating a default settings.json file in the Storage/app folder. */
    static public function reset()
    {
        $default_settings = [
            'app.title' => 'Supreme',
            'app.url' => 'http://localhost',
            'app.locale' => 'en',
            'app.translatable' => ['title', 'description', 'keywords'],
            'app.available_locales' => [
                'en' => 'English',
                'tr' => 'Türkçe',
                'de' => 'Deutsch',
                'fr' => 'Français',
                'es' => 'Español',
                'it' => 'Italiano',
            ],
            'app.currency' => 'USD',
            'app.available_currencies' => [
                'USD' => 'US Dollar',
                'EUR' => 'Euro',
                'GBP' => 'British Pound',
                'TRY' => 'Turkish Lira',
            ],
            'app.default_currency_rates' => [
                'EUR' => 1,
                'USD' => 1.06,
                'GBP' => 0.84,
                'TRY' => 15.67
            ],
            'app.timezone' => 'Europe/Istanbul',
            'app.date_format' => 'd/m/Y',
            'app.time_format' => 'H:i',
            'app.datetime_format' => 'd/m/Y H:i',
            'app.google_translate_api_key' => '',
            'app.google_maps_api_key' => '',
            'app.google_tag_manager_id' => '',
            'app.google_analytics_id' => '',
            'blog.title' => 'Blog',
            'blog.description' => '',
            'blog.keywords' => '',
            'blog.available_locales' => ['en', 'tr'],
            'blog.posts_per_page' => 10,
            'blog.comments_per_page' => 10,
            'blog.comments_enabled' => true,
            'page.seo_tags' => ['title', 'description', 'keywords'],
            'navigation.menus' => [
                'main' => [
                    'name' => 'Main',
                    'items' => [
                        [
                            'name' => 'Home',
                            'url' => 'front.home',
                            'icon' => 'fa fa-home',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Blog',
                            'url' => 'front.blog',
                            'icon' => 'fa fa-pencil',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Contact',
                            'url' => 'front.contact',
                            'icon' => 'fa fa-envelope',
                            'permission' => '',
                            'children' => [],
                        ],
                    ],
                ],
                'footer' => [
                    'name' => 'Footer',
                    'items' => [
                        [
                            'name' => 'About',
                            'url' => '/about',
                            'icon' => 'fa fa-info-circle',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Privacy',
                            'url' => '/privacy',
                            'icon' => 'fa fa-lock',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Terms',
                            'url' => '/terms',
                            'icon' => 'fa fa-file-text-o',
                            'permission' => '',
                            'children' => [],
                        ],
                    ],
                ],
                'social' => [
                    'name' => 'Social',
                    'items' => [
                        [
                            'name' => 'Facebook',
                            'url' => 'https://www.facebook.com/',
                            'icon' => 'fa fa-facebook',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Twitter',
                            'url' => 'https://www.twitter.com/',
                            'icon' => 'fa fa-twitter',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Instagram',
                            'url' => 'https://www.instagram.com/',
                            'icon' => 'fa fa-instagram',
                            'permission' => '',
                            'children' => [],
                        ],
                        [
                            'name' => 'Youtube',
                            'url' => 'https://www.youtube.com/',
                            'icon' => 'fa fa-youtube',
                            'permission' => '',
                            'children' => [],
                        ],
                    ],
                ],
            ],
            'user.default_role' => 'user',
            'user.roles' => [
                'user' => [
                    'name' => 'User',
                    'permissions' => [
                        'user.view',
                        'user.create',
                        'user.update',
                        'user.delete',
                    ],
                ],
                'admin' => [
                    'name' => 'Admin',
                    'permissions' => [
                        'user.view',
                        'user.create',
                        'user.update',
                        'user.delete',
                        'blog.view',
                        'blog.create',
                        'blog.update',
                        'blog.delete',
                        'navigation.view',
                        'navigation.create',
                        'navigation.update',
                        'navigation.delete',
                        'setting.view',
                        'setting.create',
                        'setting.update',
                        'setting.delete',
                    ],
                ],
            ],
            'settings.path' => 'settings',
            'settings.locale' => 'en',
            'settings.title' => 'Settings',
            'settings.footer_text' => '',
            'settings.navigation' => [
                'main' => [
                    'name' => 'Main',
                    'items' => [
                        [
                            'name' => 'Blog',
                            'url' => 'settings.blog',
                            'icon' => 'fa fa-pencil',
                            'permission' => '',
                            'aligment' => 'left',
                            'children' => [
                                [
                                    'name' => 'Posts',
                                    'url' => 'settings.posts',
                                    'icon' => 'fa fa-pencil',
                                    'permission' => '',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Categories',
                                    'url' => 'settings.categories',
                                    'icon' => 'fa fa-pencil',
                                    'permission' => '',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Tags',
                                    'url' => 'settings.tags',
                                    'icon' => 'fa fa-pencil',
                                    'permission' => '',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Comments',
                                    'url' => 'settings.comments',
                                    'icon' => 'fa fa-pencil',
                                    'permission' => '',
                                    'children' => [],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Settings',
                            'url' => 'settings',
                            'icon' => 'fa fa-cog',
                            'permission' => '',
                            'aligment' => 'right',
                            'children' => [],
                        ],
                    ],
                ],
            ],
        ];

        $json = json_encode($default_settings);

        $file = __DIR__ . '/Storage/app/settings.json';
        file_put_contents($file, $json);

        return 'Script executed successfully';
    }

    /* A function to get settings from the settings.json file. */
    static public function settings($key = null)
    {
        $file = __DIR__ . '/Storage/app/settings.json';
        $settings = json_decode(file_get_contents($file), true);

        if (array_key_exists($key, $settings)) {
            return $settings[$key];
        } else {
            return null;
        }
    }

    /* A function to log messages. */

    static public function log($message)
    {
        $file = __DIR__ . '/Storage/app/logs.txt';
        $log = file_get_contents($file);
        $log .= $message . "\n";
        file_put_contents($file, $log);
    }

    /* A function to translate a string. */

    static public function translateString($string = null, $source = null, $target = null)
    {

        $translate = new TranslateClient();

        if (is_null($string)) {
            return null;
        }

        if (is_null($source)) {
            //detect source language
            $source = $this->detectLanguage($string);
        }

        if (is_null($target)) {
            $target = app()->getLocale();
        }


        $translation = $translate->translate($string, [
            'key' => env('GOOGLE_TRANSLATE_API_KEY'),
            'source' => $source,
            'target' => $target,
        ]);

        return $translation['text'];
    }

    /* Detecting the language of the string. */

    static public function detectLanguage($string = null)
    {

        if (is_null($string)) {
            return null;
        }

        $translate = new TranslateClient();

        $lang = $translate->detectLanguage($string, [
            'key' => env('GOOGLE_TRANSLATE_API_KEY'),
        ]);

        return $lang['languageCode'];
    }

    static public function abort($message = null, $code = null)
    {
        if (is_null($message)) {
            $message = 'Something went wrong';
        }

        if (is_null($code)) {
            $code = 404;
        }

        return view('supreme:errors.error', ['message' => $message, 'code' => $code]);
    }
}
