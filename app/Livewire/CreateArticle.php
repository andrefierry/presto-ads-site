<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title'=>'required|min:5',
        'body'=>'required',
        'price'=>'required',
    ];

    protected $messagges = [
        'title.required'=>'è necessario inserire il titolo',
        'body.required'=> 'È necessario inserire il tuo commento',
        'price.required'=> 'È necessario inserire il prezzo',
    ];

    public function store()
    {
        Article::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
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
        return view('livewire.create-article');
    }
}
