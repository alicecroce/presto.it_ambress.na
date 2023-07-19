<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Adv extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'category_id', 'user_id', 'price', 'abstract', 'description', 'img', 'slug'];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory()
    {
        return Category::find($this->category_id)->slug;
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
        return Adv::where('is_accepted', null)->where('user_id', '!=', Auth::user()->id )->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getRouteKeyName(): string
    {       
        return 'slug';
    }

}
