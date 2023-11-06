<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable=[
        'title', 'body', 'price', 'user_id', 'category_id'
    ];

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
