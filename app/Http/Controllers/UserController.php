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

        $message = '';

        switch (session('locale')) {
            case 'en':
            $message = "Account successfully deleted!";
                break;
            case 'fr':
            $message = "Profil eliminé avec succès!";
                break;
            case 'es':
            $message = "Perfil eliminado satifactoriamente";
                break;
            
            default:
            $message = 'Cancellazione account avvenuta';
                break;
        }
        return redirect()->route('welcome')->with('success', $message);
    }
}
