<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Order;

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
        //dd(Art::all());
        return view('site.store', [
            "title" => 'Loja',
            "arts" => Art::all()
        ]);
    }

    public function artSell($artName)
    {
        $art = Art::where('name', str_replace('-', ' ', $artName))->first();
        $quantityOrders = Order::all()->count();

        /* $artName = str_replace('-', ' ', $data['artName']);
       
        $image = (new Art())->find("name = :name", "name={$artName}")->fetch();

      
        $sessionId = (new Teste())->step1();

        $requests = (new Requests())->find()->count();

        echo $this->view->render('artDescription', [
              "title" => $image->name,
              "image" => $image,
              "requests" => $requests,
              "artName" =>  $artName,
              "sessionId" => (!empty($sessionId) ? $sessionId : false)
        ]);*/

       // dd($artName, $art, $art->name);

        return view('site.artSell', [
            "title" => $artName,
            "art" => $art,
            "quantityOrders" => $quantityOrders
        ]);
    }
}
