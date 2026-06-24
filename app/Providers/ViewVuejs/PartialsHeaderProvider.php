<?php

namespace App\Providers\ViewVuejs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
// Model
use App\Models\Deity;

class PartialsHeaderProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(
            'vuejs.partials.header',
            function ($view) {
                // $view->with('MainGodData', MainGod::where('status', true)->get());

                $key = 'deity_data';
                // Cache::forget($key);// 清除
                $DeityDatas = Cache::remember(
                    $key,
                    3600,// 秒-3600約1小時
                    fn() => Deity::where('status', true)->orderBy('sort', 'asc')->get()
                );

                $view->with('DeityDatas', $DeityDatas);
            }
        );
    }
}
