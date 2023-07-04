<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use App\Models\Category;
use Livewire\Component;

class AdvEditForm extends Component
{
    public $title, $price, $abstract, $description, $img;
    public Adv $adv;
    

    protected $rules = [
        'title' => 'required|string|min:3',
        'price' => 'required|integer',
        'abstract' => 'required|string|max:200',
        'description' => 'required|string|max:500',
        'img' => 'string',

    ];

    public function mount(){
        $this->title = $this->adv->title;
        $this->price = $this->adv->price;
        $this->abstract = $this->adv->abstract;
        $this->description = $this->adv->description;
        $this->img = $this->adv->img;

    }

    public function update(){
        $this->validate();
        $this->adv->update([
            'title' => $this->adv->title,
            'price' => $this->adv->price,
            'abstract' => $this->adv->abstract,
            'description' => $this->adv->description,
            'img' => $this->adv->img,
        ]);

        session()->flash('adv', 'Annuncio modificato con successo');
        return redirect()->route('adv.index')->with('success', 'Annuncio modificato con successo!');
    }

    public function render()
    {
        return view('livewire.adv-edit-form');
    }
}
