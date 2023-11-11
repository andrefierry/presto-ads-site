<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except('categoryShow','welcome','setLanguage','allArticles');
    }

    function welcome () {
        $articles = Article::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');

        return view('welcome', compact('articles'));
    }

    function allArticles () {
        $articles = Article::all();
        return view('article.all', compact('articles'));
    }

    public function create (){
        return view('article.form-create');
    }

    public function categoryShow(Category $category){
        $categories = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->get();
        $divCategories=Category::all();
        $categoriesFiltered = $categories->where('category_id', '==', $category->id);
        return view('categoryShow', compact('category','divCategories', 'categoriesFiltered'));
    }

    public function articleDetail(Article $article){
        return view('article.detail',compact('article'));
    }

    public function searchArticles(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted',true)->paginate(10);
        return view('article.index'  ,compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function profilePage(){
        $articles = Article::all();
        return view('profile.page',compact('articles'));
    }

    

}
