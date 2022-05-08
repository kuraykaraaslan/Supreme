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
            'app.title' => 'Inferno Yapı',
            'app.url' => 'http://localhost',
            'app.description' => 'Supreme is a simple and powerful framework for Laravel.',
            'app.keywords' => 'supreme, laravel, framework',
            'app.favicon' => '',
            'app.logo' => asset('supreme/images/coop/logo.png'),
            'app.logo-sticky' => asset('supreme/images/coop/logo-sticky.png'),
            'app.locale' => 'tr',
            'app.translatable' => ['title', 'description', 'keywords'],
            'app.available_locales' => [
                'en' => 'English',
                'tr' => 'Türkçe',
                'de' => 'Deutsch',
                'fr' => 'Français',
                'es' => 'Español',
                'it' => 'Italiano',
            ],
            'app.currency' => 'try',
            'app.available_currencies' => [
                'usd' => 'US Dollar',
                'eur' => 'Euro',
                'gbp' => 'British Pound',
                'try' => 'Turkish Lira',
            ],
            'app.default_currency_rates' => [
                'eur' => 1,
                'usd' => 1.06,
                'gbp' => 0.84,
                'try' => 15.67
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
            'blog.available_locales' => ['tr'],
            'blog.posts_per_page' => 10,
            'blog.comments_per_page' => 10,
            'blog.comments_enabled' => true,
            'page.seo_tags' => ['title', 'description', 'keywords'],
            'navigation.footer_widgets' => 
            [
                [
                    'name' => 'navigation.services',
                    'type' => 'route',
                    'url' => '#',
                    'icon' => 'fa fa-cogs',
                    'order' => 1,
                    'available_locales' => [],
                    'active' => true,
                    'items' => [
                    [
                        'name' => 'navigation.services.structural',
                        'type' => 'route',
                        'url' => 'front.services.structural',
                        'icon' => 'fa fa-building',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                    [
                        'name' => 'navigation.services.architectural',
                        'type' => 'route',
                        'url' => 'front.services.architectural',
                        'icon' => 'fa fa-building',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                    [
                        'name' => 'navigation.services.interior',
                        'type' => 'route',
                        'url' => 'front.services.interior',
                        'icon' => 'fa fa-home',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                ],
                ],
                [   
                    'name' => 'navigation.about',
                    'type' => 'route',
                    'url' => '#',
                    'icon' => 'fa fa-info-circle',
                    'order' => 2,
                    'available_locales' => [],
                    'items' => [
                    [
                        'name' => 'navigation.about',
                        'type' => 'route',
                        'url' => 'front.about',
                        'icon' => 'fa fa-info-circle',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                    [
                        'name' => 'navigation.privacy',
                        'type' => 'route',
                        'url' => 'front.privacy',
                        'icon' => 'fa fa-lock',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                    [
                        'name' => 'navigation.careers',
                        'type' => 'route',
                        'url' => 'front.careers',
                        'icon' => 'fa fa-briefcase',
                        'role' => 'guest',
                        'available_locales' => [],
                        'active' => true,
                        'children' => [],
                    ],
                    [
                        'name' => 'navigation.blog',
                        'type' => 'route',
                        'url' => 'front.blog',
                        'icon' => 'fa fa-pencil',
                        'role' => 'guest',
                        'available_locales' => ['tr'],
                        'active' => true,
                        'children' => [],
                    ],

                ],
                ],
            ],
            'navigation.menus' => [
                'main' => [
                    'name' => 'Main',
                    'items' => [
                        [
                            'name' => 'navigation.homepage',
                            'type' => 'route',
                            'url' => 'front.homepage',
                            'icon' => 'fa fa-home',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'children' => [],
                        ],
                        [
                            'name' => 'navigation.blog',
                            'type' => 'route',
                            'url' => 'front.blog',
                            'icon' => 'fa fa-pencil',
                            'role' => 'guest',
                            'available_locales' => ['tr'],
                            'active' => true,
                            'children' => [],
                        ],
                        [
                            'name' => 'navigation.contact',
                            'type' => 'route',
                            'url' => 'front.contact',
                            'icon' => 'fa fa-envelope',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'children' => [],
                        ],
                    ],
                ],
                'footer' => [
                    'name' => 'Footer',
                    'items' => [
                        [
                            'name' => 'navigation.about',
                            'type' => 'route',
                            'url' => 'front.about',
                            'icon' => 'fa fa-info-circle',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'children' => [],
                        ],
                        [
                            'name' => 'navigation.privacy',
                            'type' => 'route',
                            'url' => 'front.privacy',
                            'icon' => 'fa fa-lock',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'children' => [],
                        ],
                        [
                            'name' => 'navigation.terms',
                            'type' => 'route',
                            'url' => 'front.terms',
                            'icon' => 'fa fa-file-text-o',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'children' => [],
                        ],
                    ],
                ],
                'social' => [
                    'name' => 'Social',
                    'items' => [
                        [
                            'name' => 'navigation.courses',
                            'type' => 'route',
                            'url' => 'front.courses',
                            'icon' => 'fa fa-book',
                            'role' => 'guest',
                            'available_locales' => ['tr'],
                            'active' => true,
                            'color' => '#3b5998',
                            'class' => 'si-udemy',
                            
                        ],
                        [
                            'name' => 'navigation.social.facebook',
                            'type' => 'link',
                            'url' => 'https://www.facebook.com/infernoyapi',
                            'icon' => 'fa-brands fa-facebook',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#3b5998',
                            'class' => 'si-facebook',
                        ],
                        [
                            'name' => 'navigation.social.twitter',
                            'type' => 'link',
                            'url' => 'https://www.twitter.com/infernoyapi',
                            'icon' => 'fa-brands fa-twitter',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#00aced',
                            'class' => 'si-twitter',
                        ],
                        [
                            'name' => 'navigation.social.youtube',
                            'type' => 'link',
                            'url' => 'https://www.youtube.com/infernoyapi',
                            'icon' => 'fa-brands fa-youtube',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#ff0000',
                            'class' => 'si-youtube',
                        ],
                        [
                            'name' => 'navigation.social.linkedin',
                            'type' => 'link',
                            'url' => 'https://www.linkedin.com/company/infernoyapi',
                            'icon' => 'fa-brands fa-linkedin',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#007bb6',
                            'class' => 'si-linkedin',
                        ],
                        [
                            'name' => 'navigation.social.instagram',
                            'type' => 'link',
                            'url' => 'https://www.instagram.com/infernoyapi',
                            'icon' => 'fa-brands fa-instagram',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#517fa4',
                            'class' => 'si-instagram',
                        ],
                        [
                            'name' => 'navigation.social.whatsapp',
                            'type' => 'link',
                            'url' => 'https://wa.me/905516815365',
                            'icon' => 'fa-brands fa-whatsapp',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#25d366',
                            'class' => 'si-whatsapp',
                        ],
                        [
                            'name' => 'navigation.social.email',
                            'type' => 'link',
                            'url' => 'mailto:info@infernoyapi.com',
                            'icon' => 'fa fa-envelope',
                            'role' => 'guest',
                            'available_locales' => [],
                            'active' => true,
                            'color' => '#000000',
                            'class' => 'si-email1',
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
                            'role' => 'guest',
                            'aligment' => 'left',
                            'children' => [
                                [
                                    'name' => 'Posts',
                                    'url' => 'settings.posts',
                                    'icon' => 'fa fa-pencil',
                                    'role' => 'guest',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Categories',
                                    'url' => 'settings.categories',
                                    'icon' => 'fa fa-pencil',
                                    'role' => 'guest',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Tags',
                                    'url' => 'settings.tags',
                                    'icon' => 'fa fa-pencil',
                                    'role' => 'guest',
                                    'children' => [],
                                ],
                                [
                                    'name' => 'Comments',
                                    'url' => 'settings.comments',
                                    'icon' => 'fa fa-pencil',
                                    'role' => 'guest',
                                    'children' => [],
                                ],
                            ],
                        ],
                        [
                            'name' => 'Settings',
                            'url' => 'settings',
                            'icon' => 'fa fa-cog',
                            'role' => 'guest',
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
    static public function settings($key = null, $vaule = null)
    {
        $file = __DIR__ . '/Storage/app/settings.json';
        $settings = json_decode(file_get_contents($file), true);

        if ($vaule) {
            $settings[$key] = $vaule;
            file_put_contents($file, json_encode($settings));
        } else {
            if (array_key_exists($key, $settings)) {
                return $settings[$key];
            } else {
                return null;
            }
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

    static public function getMenu($name = null)
    {
        $file = __DIR__ . '/Storage/app/settings.json';
        $settings = json_decode(file_get_contents($file), true);

        if (is_null($name)) {
            return [];
        }
    }


}
