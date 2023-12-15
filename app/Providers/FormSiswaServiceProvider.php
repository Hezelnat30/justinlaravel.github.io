<?php

namespace App\Providers;

use App\Models\Hobi;
use App\Models\Kelas;
use Illuminate\Support\ServiceProvider;

class FormSiswaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
        view()->composer('siswa.form', function ($view) {
            $view->with('kelas', Kelas::all('nama_kelas', 'id'));
            $view->with('list_hobi', Hobi::all('nama_hobi', 'id'));
        });
        view()->composer('siswa.form_pencarian', function ($view) {
            $view->with('kelas', Kelas::all('nama_kelas', 'id'));
        });
    }
}
