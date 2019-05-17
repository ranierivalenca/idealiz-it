<?php

namespace App\Http\Middleware;

use Closure;
use App;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->server('HTTP_ACCEPT_LANGUAGE');
        $langs = explode(',', $locale);
        $langs = array_map(function($el) { return explode(';', $el)[0]; }, $langs);
        $langs = array_map('strtolower', $langs);
        foreach($langs as $lang) {
            if (in_array($lang, config('app.available_locales'))) {
                App::setLocale($lang);
                break;
            }
        }

        return $next($request);
    }
}
