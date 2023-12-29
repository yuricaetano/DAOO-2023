<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index():void{
        echo "HomeController Olá mundo!";
        dd("Termiinou...");
    }
}
