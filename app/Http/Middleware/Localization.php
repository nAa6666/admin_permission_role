<?php

namespace App\Http\Middleware;

use App;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Request;

class Localization
{
    public static function getLocale()
    {
        $locales = \config('app.locales');
        $uri = Request::path();
        $segmentsURI = explode('/', $uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], $locales)) {
            return $segmentsURI[0];
        }
        return null;
    }

    public function handle($request, Closure $next){
        if(request()->segment(1) == 'uk'){
            $redirect = str_replace('/uk', '', request()->server('REQUEST_URI'));
            return redirect(sprintf('%s%s', config('app.url'), $redirect), 301);
        }

        $defaultLocale = 'uk';
        $locale = self::getLocale();

        foreach (\config('app.localeISO2') as $key=>$iso){
            if ($locale === $key || is_null($locale)){
                setlocale(LC_ALL, $iso);
                Carbon::setLocale($key);
                break;
            }
        }

        if($locale){
            app()->setLocale($locale);
        }else{
            app()->setLocale($defaultLocale);
        }

        return $next($request);
    }
}

