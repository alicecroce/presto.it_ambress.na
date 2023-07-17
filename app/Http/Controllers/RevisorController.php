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
        $adv_to_check = Adv::where('is_accepted', null)->where('user_id', '!=', Auth::user()->id )->first();
        return view('revisor.index', compact('adv_to_check'));
    }

    public function acceptAdv(Adv $adv)
    {
        $adv->setAccepted(true);

        $message = '';
        
        switch (session('locale')) {
            case 'en':
            $message = "Announcement accepted!";
                break;
            case 'fr':
            $message = "Announce accepté!";
                break;
            case 'es':
            $message = "¡Anuncio aceptado!";
                break;
            
            default:
            $message = 'Annuncio accettato!';
                break;
        }

        return redirect()->route('revisor.index')->with('success', $message);
    }

    public function rejectAdv(Adv $adv)
    {
        $adv->setAccepted(false);
    
        $message = '';
        
        switch (session('locale')) {
            case 'en':
            $message = "Announcement rejected!";
                break;
            case 'fr':
            $message = "Announce rejeté!";
                break;
            case 'es':
            $message = "¡Anuncio rechezado!";
                break;
            
            default:
            $message = 'Annuncio rifiutato';
                break;
        }
        
        return redirect()->route('revisor.index')->with('success', $message);
    }

    public function acceptRejectedAdv(Adv $adv)
    {
        $adv->setAccepted(true);


        $message = '';
        
        switch (session('locale')) {
            case 'en':
            $message = "Announcement accepted!";
                break;
            case 'fr':
            $message = "Announce accepté!";
                break;
            case 'es':
            $message = "¡Anuncio aceptado!";
                break;
            
            default:
            $message = 'Annuncio accettato!';
                break;
        }
        

        return redirect()->route('rejected')->with('success', $message);
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

        $message = '';
        
        switch (session('locale')) {
            case 'en':
            $message = "You're request has been successfully sent";
                break;
            case 'fr':
            $message = "Votre demande a été envoieé avec succès";
                break;
            case 'es':
            $message = "¡Su petición fue enviada con éxito!";
                break;
            
            default:
            $message = 'La tua richiesta è stata correttamente inviata!';
                break;
        }
        
        return redirect()->back()->with('success', $message);
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:make-user-revisor', ["email" => $user->email]);


        
        $message = '';
        
        switch (session('locale')) {
            case 'en':
            $message = "Congratulations! You're now officially a revisor for Presto.it";
                break;
            case 'fr':
            $message = "Félicitations! Vous faites officiellement partie de notre équipe, vous êtes unə reviseurə pour Presto.it!";
                break;
            case 'es':
            $message = "¡Felicitaciones! Estás oficialmente en el equipo de Ambress.na, eres un revisor por Presto.it";
                break;
            
            default:
            $message = 'Complimenti! Fai ufficialmente parte del team di Ambress.na, sei diventato revisore di Presto.it!';
                break;
        }
        
        return redirect()->route('welcome')->with('success', $message);
    }

    public function not_accepted()
    {
        $advs = Adv::orderBy('created_at', 'desc')->where('is_accepted', false)->paginate(8);

        return view('revisor.rejected', ['advs' => $advs]);
    }
}
