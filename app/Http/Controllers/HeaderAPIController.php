<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderAPIController extends Controller
{
    public static function Slug($route = null, $data = null, $slugid = null){

        $app_langs = \config('app.locales'); //Получили все локали

        //Проходим по всем локалям
        foreach ($app_langs as $value){
            $slug = request()->path(); //Полуяаем все что идет после домена

            //Проверяем главная или нет
            if(strlen($slug) >= 1 && !\Route::is('home')){
                $slug = '/'.$slug;
                $lang_nodefault = config('app.url').$slug;
            }
            else{
                $slug = null;
                $lang_nodefault = config('app.url').'/';
            }

            //uk локали все стираем

            //Проверяем если язык не uk записываем все что после домена и стираем локаль которая присутствует
            if (preg_match('/(ru|en)/', \config('app.locale'))) {
                $slug = substr($slug, 3);
                $lang_nodefault = config('app.url').$slug; //uk локали добавляем все что после домена
            }

            //Проверка на роуты...
            if($route == 'news'){
                $transSlug = collect($data)->whereIn('locale', $value)->first()['slug'];
                if($value != 'uk'){
                    $languages[$value] = config('app.url').'/'.$value.'/'.$route.'/'.$transSlug;
                }
                else{
                    $languages[$value] = config('app.url').'/'.$route.'/'.$transSlug;
                }
            }else{
                if($value != 'uk'){
                    $languages[$value] = config('app.url').'/'.$value.$slug;
                }
                else{
                    $languages[$value] = $lang_nodefault;
                }
            }
        }
        return $languages;
    }
}
