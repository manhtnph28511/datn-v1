<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    // About Page
    public function about() {
        return view('clients.pages.about');
    }

    //Contact Page
    public function contact() {
        return view('clients.pages.contact');
    }
    // 

}
