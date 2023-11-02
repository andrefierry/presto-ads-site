<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function welcome () {
        $articles = Article::take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('articles'));
    }

    function create (){
        return view('article.form-create');
    }
}
