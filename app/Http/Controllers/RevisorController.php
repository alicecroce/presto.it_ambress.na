<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $adv_to_check = Adv::where('is_accepted', null)->first();
        return view('revisor.index', compact('adv_to_check'));
    }


}
