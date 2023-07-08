<?php

namespace App\Models;

use App\Models\Adv;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['path'];

    public function adv(){
        return $this->belongsTo(Adv::class);
    }
}
