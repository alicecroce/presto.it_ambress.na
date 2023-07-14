<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use App\Models\Category;
use Livewire\Component;

class AdvEditForm extends Component
{
    public $title, $price, $abstract, $description, $img;
    public Adv $adv;
    public $category;
    public $category_id;

    protected $rules = [
        'title' => 'required|string|min:3',
        'price' => 'required',
        'abstract' => 'required|string|max:200',
        'description' => 'required|string|max:500',
        'img' => 'string',

    ];

    public function mount(){
        $this->title = $this->adv->title;
        $this->price = $this->adv->price;
        $this->category = $this->adv->category->id;
        $this->abstract = $this->adv->abstract;
        $this->description = $this->adv->description;
        $this->img = $this->adv->img;
    }

    public function update(){
        $this->validate();
        $this->adv->update([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' => $this->category,
            'abstract' => $this->abstract,
            'description' => $this->description,
            'img' => $this->img,
        ]);

        // session()->flash('adv', 'Annuncio modificato con successo');


        $message = '';

        switch (session('locale')) {
            case 'en':
            $message = "Announcement successfully modified!";
                break;
            case 'fr':
            $message = "Announce modifié avec succès!";
                break;
            case 'es':
            $message = "Anuncio modificado satifactoriamente!";
                break;
            
            default:
            $message = 'Annuncio modificato con successo!';
                break;
        }

        return redirect()->route('adv.index')->with('success', $message);
    }


    public function destroy(Adv $adv)
    {
        $adv->delete();

        session()->flash('adv', 'Annuncio eliminato correttamente.');

        $message = '';
        switch (session('locale')) {
            case 'en':
            $message = "Announcement successfully deleted!";
                break;
            case 'fr':
            $message = "Announce annullé avec succès!";
                break;
            case 'es':
            $message = "Anuncio eliminado satifactoriamente!";
                break;
            
            default:
            $message = 'Annuncio eliminato con successo!';
                break;
        }


        return redirect()->route('adv.index')->with('success', $message);
    }

    public function render()
    {
        return view('livewire.adv-edit-form');
    }
}
