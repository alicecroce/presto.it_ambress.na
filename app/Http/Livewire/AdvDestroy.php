<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use Livewire\Component;

class AdvDestroy extends Component
{

    public function destroy(Adv $adv)
    {
        $adv->delete();
        session()->flash('tasks', 'Annuncio eliminata correttamente.');
        return redirect()->route('tasks.index')->with('success', 'Annuncio eliminata con successo.');
    }
    public function render()
    {
        return view('livewire.adv-destroy');
    }
}
