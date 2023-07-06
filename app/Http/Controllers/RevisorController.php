<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Adv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        return redirect()->route('revisor.index')->with('success', 'Annuncio accettato');
    }

    public function rejectAdv(Adv $adv)
    {
        $adv->setAccepted(false);
        return redirect()->route('revisor.index')->with('success', 'Annuncio rifiutato');
    }

    // public function becomeRevisor()
    // {
    //     Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    //     return redirect()->route('welcome')->with('success', 'Complimenti! Hai correttamente richiesto di diventare revisore');
    // }

    public function contactUs()
    {
        return view('revisor.contact_us');
    }

    public function saveContact(Request $request)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->description));
        return redirect()->back()->with('success', 'La tua richiesta è stata correttamente inviata!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:make-user-revisor', ["email" => $user->email]);
        return redirect()->route('welcome')->with('success', 'Complimenti! Fai ufficialmente parte del team di Ambress.na, sei diventato revisore di Presto.it!');
    }

    public function not_accepted()
    {
        $advs = Adv::orderBy('created_at', 'desc')->where('is_accepted', false)->paginate(8);

        return view('revisor.rejected', ['advs' => $advs]);
    }
}
