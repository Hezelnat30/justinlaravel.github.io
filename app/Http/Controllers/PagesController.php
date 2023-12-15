<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Homepage Controller
    public function homepage()
    {
        return view('pages.homepage');
    }
    //About Controller
    public function about()
    {
        $halaman = 'about';
        return view('pages.about', [
            'halaman' => $halaman
        ]);
    }
}
