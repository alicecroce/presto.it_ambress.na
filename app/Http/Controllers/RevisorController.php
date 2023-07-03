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

    public function acceptAdv(Adv $adv)
    {
        $adv->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectAdv(Adv $adv)
    {
        $adv->setAccepted(false);
        return redirect()->back()->with('message', 'Hai correttamente rifiutato l\'annuncio');
    }
}
