<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class Web extends Controller
{
    public function home()
    {
        return view('site.home', [
            "title" => 'Home'
        ]);
    }

    public function contact()
    {
        return view('site.contact', [
            "title" => 'Contato'
        ]);
    }

    public function login()
    {
        return view('site.login', [
            "title" => 'Login'
        ]);
    }

    public function portifolio()
    {
        return view('site.portifolio', [
            "title" => 'Portifólio'
        ]);
    }

    public function register()
    {
        return view('site.register', [
            "title" => 'Registre-se'
        ]);
    }

    public function store()
    {
        return view('site.store', [
            "title" => 'Loja'
        ]);
    }

    public function artSell($art)
    {
        return view('site.artSell', [
            "title" => $art,
            "productName" => $art
        ]);
    }
}
