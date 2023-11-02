<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateArticle extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;
   

    protected $rules = [
        'title'=>'required|min:5',
        'body'=>'required',
        'price'=>'required',
        'category'=>'required',
        
    ];

    protected $messages = [
        'title.required'=>'È necessario inserire il titolo',
        'title.min'=>'È necessario inserire almeno 5 caratteri',
        'body.required'=> 'È necessario inserire il tuo commento',
        'price.required'=> 'È necessario inserire il prezzo',
        'category.required'=> 'È necessario selezionare una categoria',
    ];

    public function store()
    {
        $this->validate();
        Article::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'user_id'=>Auth::user()->id, 
            'category_id'=>$this->category,
        ]);

        $this->title='';
        $this->body='';
        $this->price='';

        session()->flash('message', 'Post creato con successo');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $categories = Category::all(); 
        return view('livewire.create-article', compact('categories'));
    }
}
