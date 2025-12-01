<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Lokasi;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Kirim data lokasi ke layout utama, navbar, dan footer
        View::composer([
            'layouts-public.all','layouts-public.navbar','layouts-public.footer'], function ($view) {
            $view->with('lokasi', Lokasi::first());
        });
    }
}
