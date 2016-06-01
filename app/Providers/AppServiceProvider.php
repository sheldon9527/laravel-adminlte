<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $language = \Request::get('language') ?: \Request::header('accept-language') ?: 'en';
        $language = strtolower(substr($language, 0, 2));
        //有fallback_locale 所以不用担心传入错误
        app()->setLocale($language);

        // 如果有跳转等情况，需要把token放在url中
        if ($token = \Request::get('token')) {
            app('request')->headers->set('Authorization','Bearer '.$token);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
