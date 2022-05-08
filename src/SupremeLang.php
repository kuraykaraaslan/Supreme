<?php

namespace Kuraykaraaslan\Supreme;

use Google\Cloud\Translate\TranslateClient;
use Kuraykaraaslan\Supreme\Modals\Post;

/**
 * @see \Kuraykaraaslan\Supreme\Skeleton\SkeletonClass
 */
class SupremeLang
{


    static public function trans_route_alternate_lang($locale, $force = true)
    {
        return self::trans_route_alternate(null, [], $locale, $force);
    }

    /* Creating a default settings.json file in the Storage/app folder. */
    static public function alternate($lang)
    {
        $locales = Supreme::settings('app.locales');

        $routeNameRequest = request()->route()->getName();

        $routeParamsRequest = request()->route()->parameters();

        switch ($routeNameRequest) {
            case 'value':
                # code...
                break;

            default:

                $localized = __('supreme::routes.' . $routeNameRequest, [], $lang);

                break;
        }

        if (!Supreme::settings('app.force_locale')) {
            return url('/' . $lang . '/' . $localized);
        } else {
            return url('/' . $localized);
        }
    }

    static public function getLocale()
    {
        return app()->getLocale();
    }

    static public function getCurrency()
    {
        if (session()->has('currency')) {
            return session()->get('currency');
        } else {
            return Supreme::settings('app.currency');
        }
    }

    static public function getTranslatedLanguages()
    {

        if (isset($_SERVER['REQUEST_URI'])) {
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);

            $segment = $uri_segments[1];

            if (array_key_exists($segment, Supreme::settings('app.available_locales'))) {
                return $segment;
            } else {
                return '';
            }
        }
    }

    static public function trans_choice(string $key, Countable|int|array $number = 0, array $replace = [], string|null $locale = null)
    {
        return trans_choice('supreme::' . $key, $number, $replace, $locale);
    }

    static public function trans_route(string $key, Countable|int|array $number = 0, array $replace = [], string|null $locale = null)
    {

        $file = __DIR__ . '/Routes/routes.json';

        $routesJson = json_decode(file_get_contents($file), true);

        if ($locale == null) {
            //get first segment[1] of url
            if (isset($_SERVER['REQUEST_URI'])) {
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $segments = explode('/', $url);
            if (array_key_exists($segments[1], $routesJson['front.blog'])) {
                $locale = $segments[1];
            } else {
                $locale = Supreme::settings('app.locale');
            }
        }
        }

        if (array_key_exists($key, $routesJson)) {
            if (array_key_exists($locale, $routesJson[$key])) {
                return $routesJson[$key][$locale];
            } elseif (array_key_exists(Supreme::settings('app.locale'), $routesJson[$key])) {
                return $routesJson[$key][Supreme::settings('app.locale')];
            } elseif (array_keys($routesJson[$key])[0]) {
                return $routesJson[$key][array_keys($routesJson[$key])[0]];
            } else {
                return $key;
            }
        }
    }

    static public function trans_route_bulk(string $key, Countable|int|array $number = 0, array $replace = [], string|null $locale = null)
    {

        $file = __DIR__ . '/Routes/routes.json';

        $routesJson = json_decode(file_get_contents($file), true);

        if (array_key_exists($key, $routesJson)) {
            return $routesJson[$key];
        } else {
            return [];
        }
    }

    static public function trans_route_alternate($key = null, $replace = [], $locale = null, $force = true)
    {
        if ($key == null) {
            $key = request()->route()->getName();
        }

        if ($locale == null) {
            $locale = app()->getLocale();
        }

        if ($replace == null) {
            switch ($key) {
                case 'front.post':
                    $id = request()->route()->parameters()['id'];
                    $post = Post::find($id);
                    $replace = [
                        '{post}' => $post->getVaule('title', $locale),
                        'category' => $post->category->getValue('title', $locale),
                        'id' => $id,
                    ];
                    break;
                case 'front.category':
                    $category = request()->route()->parameters()['category'];
                    $replace = [
                        '{category}' => $category,
                    ];
                    break;
                default:
                    $replace = [];
                    break;
            }

            $transRoute = self::trans_route($key, 0, [], $locale);
            //preg_replace

            $transRoute = preg_replace_callback('/\{([a-zA-Z0-9_\-]+)\}/', function ($matches) use ($replace) {
                return $replace[$matches[1]];
            }, $transRoute);


            if ($force) {
                return url('/' . $locale . '/' . $transRoute);
            } else {
                if ($locale == Supreme::settings('app.locale')) {
                    return url('/' . $transRoute);
                } else {
                    return url('/' . $locale . '/' . $transRoute);
                }
            }
        }
    }

    static public function trans_route_alternate_bulk($key = null, $force = true)
    {
        if ($key == null) {
            $key = request()->route()->getName();
        }

        $available_locales = Supreme::settings('app.available_locales');

        

        switch ($key) {
            case 'front.post':
                $id = request()->route()->parameters()['id'];
                $post = Post::find($id);
                break;
            case 'front.category':
                $category = request()->route()->parameters()['category'];
                $replaces = [
                    'category' => $category,
                ];
                break;
            default:
                $replace = [];
                break;

        }

        $urls = [];

        $transRouteRoot = self::trans_route($key, 0, [], $locale);
                //preg_replace



        $transRoute = preg_replace_callback('/\{([a-zA-Z0-9_\-]+)\}/', function ($matches) use ($replace) {
                    return $replace[$matches[1]];
                }, $transRoute);


                if ($force) {
                    return url('/' . $locale . '/' . $transRoute);
                } else {
                    if ($locale == Supreme::settings('app.locale')) {
                        return url('/' . $transRoute);
                    } else {
                        return url('/' . $locale . '/' . $transRoute);
                    }
                }
        }

    }

