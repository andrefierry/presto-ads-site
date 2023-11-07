<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable=[
        'title', 'body', 'price', 'user_id', 'category_id'
    ];


    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $category = $this->category();
        $array = [
            'id' => $this->id,
            'title'=> $this->title, 
            'body'=> $this->body,
            'category' =>$this->category,
        ]; 
        
        return $array;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class); 
    }

    public function category() : BelongsTo 
    {
        $articles = $this::orderbyDesc('category_id')->get();

        return $this->belongsTo(Category::class, 'category_id'); 
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Article::where('is_accepted', null)->count();
    }

}
