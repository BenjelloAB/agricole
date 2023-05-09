<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CulturController extends Controller
{
    public function index()
    {
        return view('culture.cultur');
    }

    public function store(){
        return view('culture.empty');
    }


}