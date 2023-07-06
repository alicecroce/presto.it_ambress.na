<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Adv;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
       // $advs = Adv::all();
        $categories = Category::all();
        if(Auth::user()){
            $advs = Adv::where('user_id', Auth::user()->id)->get();
            // dd($advs);

        }


        return view('user_profile.index', compact('categories', 'advs'));

    }

    public function edit(){
        $advs = Adv::all();
        $categories = Category::all();
        return view('user_profile.edit', compact('advs', 'categories', ));
    }

    public function destroy(User $user){
        $user = Auth::user();
        $user->delete();
        return redirect()->route('welcome')->with('success', 'Cancellazione account avvenuta');
    }
}
