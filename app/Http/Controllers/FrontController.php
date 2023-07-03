<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function searchAdvs(Request $request) {
        $advs = Adv::search($request->searched);

        return view('adv.index', compact('advs'));
    }
}