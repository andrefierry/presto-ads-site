<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads; 

class CreateArticle extends Component
{
    use WithFileUploads;

    public $photo; 
    
    public $title;
    public $body;
    public $price;
    public $category;
    public $images = []; 
    public $temporary_images; 
    public $article; 
    public $image; 
    public $form_id; 
    
    
    protected $rules = [
        'title'=>'required|min:5',
        'body'=>'required',
        'price'=>'required',
        'category'=>'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' =>'image|max:1024', 
        
    ];
    
    protected $messages = [
        'title.required'=>'È necessario inserire il titolo',
        'title.min'=>'È necessario inserire almeno 5 caratteri',
        'body.required'=> 'È necessario inserire il tuo commento',
        'price.required'=> 'È necessario inserire il prezzo',
        'category.required'=> 'È necessario selezionare una categoria',
        'temporary_images.required' => "È obbligatorio caricare l'immagine", 
        'temporary_images.*.image' => "Il file deve essere un'immagine", 
        'temporary_images.*.max' => "L'immagine dev'essere massimo di 1 mb", 
        'images.image' => "L'immagine deve essere un'immagine", 
        'images.max' => "L'immagine deve essere massimo di 1 mb",
    ];
    
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function store()
    {
        $this->validate();

        // Article::create([
            
        // ]);

        $this->article = Category::find($this->category)->articles()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'user_id'=>Auth::user()->id, 
            'category_id'=>$this->category,
        ]);

        if(count($this->images))
        {
            foreach($this->images as $image) {
                $this->article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }
       
        
        session()->flash('message', 'Articolo creato con successo');

            $this->cleanForm(); 
            
            $this->article->user()->associate(Auth::user());

            $this->article->save(); 

    }
        
    
    
    
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    
    public function updateTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',])) {
                foreach($this->temporary_images as $image) {
                    $this->images[] = $image; 
                }
            }
        }
        
        public function removeImage($key)
        {
            if (in_array($key, array_keys($this->images))) {
                unset($this->images[$key]); 
            }
        }
        
        
    
        public function update($propertyName)
        {
            $this->validateOnly($propertyName); 
        }
        
        public function cleanForm()
        {
            $this->title =''; 
            $this->body =''; 
            $this->category = ''; 
            $this->image='';
            $this->images =[]; 
            $this->temporary_images = []; 
            $this->form_id = rand(); 
        }
        
        public function render()
        {
            $categories = Category::all(); 
            return view('livewire.create-article', compact('categories'));
            
        }
        
    }