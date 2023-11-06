<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index (){
        $article_to_check=Article::where('is_accepted', null)->first();
        
        return view('revisor.index', compact('article_to_check'));
    }
    
    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message', "Complimenti hai accettato l'annuncio"); 
    }
    
    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message', "Complimenti hai rifiutato l'annuncio"); 
    }
}
