<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index (){
        $article_to_check = Article::where('is_accepted', null)->first();
        $article_to_null = Article::whereNotNull('is_accepted')->orderBy('created_at','DESC')->first();
        return view('revisor.index', compact('article_to_check','article_to_null'));
    }
    
    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message', "Complimenti hai accettato l'annuncio"); 
    }
    
    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message', "Complimenti hai rifiutato l'annuncio"); 
    }

    public function nullArticle(Article $article){
        $article->setAccepted(null);
        return redirect()->back()->with('message', "Hai annullato la tua ultima operazione"); 
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user())); 
        return redirect()->back()->with('message', 'Complimenti! Hai richiesto di diventare revisore'); 
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect ('/')->with("message", "Complimenti, l'utente è diventato il nuovo revisore");
    }

}
