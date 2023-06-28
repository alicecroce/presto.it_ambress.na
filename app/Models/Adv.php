<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'user_id', 'price', 'abstract', 'description', 'img'];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function getCategory(){
        return Category::find($this->category_id)->name;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
