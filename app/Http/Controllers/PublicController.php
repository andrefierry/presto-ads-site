<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    function welcome () {
        return view('welcome');
    }

    function create (){
        return view('article.form-create');
    }
}
