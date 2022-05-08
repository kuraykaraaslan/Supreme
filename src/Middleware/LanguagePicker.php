<?php

namespace Kuraykaraaslan\Supreme\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Kuraykaraaslan\Supreme\Supreme;

class LanguagePicker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
/**
 * If the first segment of the URL is a locale, set the locale and continue. Otherwise, set the locale
 * to the default locale and continue
 * 
 * @param Request request The incoming request.
 * @param Closure next The next middleware to be executed.
 * 
 * @return The next middleware in the stack.
 */
    public function handle(Request $request, Closure $next)
    {

        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        $segment = $uri_segments[1];
        
        if (array_key_exists($segment, Supreme::settings('app.available_locales'))) {
            Session::put('locale', $segment);
            App()->setLocale($segment);
        } else {
            App::setLocale(Supreme::settings('app.locale'));
            Session::put('locale', Supreme::settings('app.locale'));
            App()->setLocale(Supreme::settings('app.locale'));
        }
        return $next($request);
    }
}
