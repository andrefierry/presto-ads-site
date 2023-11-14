<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads; 
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public $validated;
    
    
    
    protected $rules = [
        'title'=>'required|min:5',
        'body'=>'required',
        'price'=>'required',
        'category'=>'required',
        'images.*' => 'image|max:2048',
        'temporary_images.*' =>'image|max:2048', 
        
    ];
    
    protected $messages = [
        'title.required'=>'È necessario inserire il titolo',
        'title.min'=>'È necessario inserire almeno 5 caratteri',
        'body.required'=> 'È necessario inserire il tuo commento',
        'price.required'=> 'È necessario inserire il prezzo',
        'category.required'=> 'È necessario selezionare una categoria',
        'temporary_images.required' => "È obbligatorio caricare l'immagine", 
        'temporary_images.*.image' => "Il file deve essere un'immagine", 
        'temporary_images.*.max' => "L'immagine dev'essere massimo di 2 mb", 
        'images.image' => "L'immagine deve essere un'immagine", 
        'images.max' => "L'immagine deve essere massimo di 2 mb",
    ];
    
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048',
        ]);
    }
    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:1024'])) {
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
    
    public function updated($propertyName)
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
    public function store()
    {
        $this->validate();
        
        // Article::create([
        //     'title'=>$this->title,
        //     'body'=>$this->body,
        //     'price'=>$this->price,
        //     'user_id'=>Auth::user()->id, 
        //     'category_id'=>$this->category,
        // ]);
        
        
        // $this->article = Category::find($this->category)->articles()->create($this->validate());
        // if(count($this->images))
        // {
        //     foreach($this->images as $image) {
        //         $this->article->images()->create(['path' => $image->store('images', 'public')]);
        //     }
        // };

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
                // $this->article->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path'=> $image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 400 , 300),
                    new GoogleVisionSafeSearch($newImage->id), 
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id); 

                
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        };

        session()->flash('message', 'Articolo creato con successo');
        $this->cleanForm(); 
        $this->article->user()->associate(Auth::user());
        $this->article->save();

        // dd($this->images);   


    }

     
        public function render()
        {
            $categories = Category::all(); 
            return view('livewire.create-article', compact('categories'));
            
        }


        
}