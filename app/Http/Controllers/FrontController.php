<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    public function searchAdvs(Request $request)
    {
        $advs = Adv::search($request->searched)->where('is_accepted', true)->paginate(8);
        return view('adv.index', compact('advs'));
    }

    public function setLanguage($lang){
        //App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
