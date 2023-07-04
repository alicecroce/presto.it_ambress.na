<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $advs = Adv::all();
        $categories = Category::all();

        return view('user_profile.index');

    }
}
