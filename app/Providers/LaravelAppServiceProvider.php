<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;

class LaravelAppServiceProvider extends ServiceProvider
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
        $halaman = '';
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
        }
        if (Request::segment(1) == 'about') {
            $halaman = 'about';
        }
        if (Request::segment(1) == 'kelas') {
            $halaman = 'kelas';
        }
        if (Request::segment(1) == 'hobi') {
            $halaman = 'hobi';
        }
        if (Request::segment(1) == 'user') {
            $halaman = 'user';
        }
        view()->share('halaman', $halaman);
    }
}
