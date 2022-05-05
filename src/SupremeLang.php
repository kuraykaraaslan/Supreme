<?php

namespace Kuraykaraaslan\Supreme;

use Google\Cloud\Translate\TranslateClient;
use Kuraykaraaslan\Supreme\Modals\Post;

/**
 * @see \Kuraykaraaslan\Supreme\Skeleton\SkeletonClass
 */
class SupremeLang
{

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
}
