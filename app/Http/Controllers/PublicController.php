<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function welcome () {
        $articles = Article::take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('articles'));
    }

    public function create (){
        return view('article.form-create');
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }

    public function articleDetail(Article $article){
        return view('article.detail',compact('article'));
    }

}
