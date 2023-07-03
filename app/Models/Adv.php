<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Adv extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'category_id', 'user_id', 'price', 'abstract', 'description', 'img'];

    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'abstract' => $this->abstract,
            'description' => $this->description,
            'category' => $category,
        ];
        return $array;
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory()
    {
        return Category::find($this->category_id)->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Adv::where('is_accepted', null)->count();
    }
}
