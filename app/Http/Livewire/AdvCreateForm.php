<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreAdvRequest;
use App\Models\Adv;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdvCreateForm extends Component
{
    public $title, $category_id, $price, $abstract, $description; //$img;

    protected $rules = [
        'title' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'abstract' => 'required',
        'description' => 'max:500',
        //'img' => 'required'
    ];


    public function store()
    {
        $this->validate();

        // $file_path = "";
        // if($request->file('image') && $request->file('image')->isValid()){
        //   $file_name = $request->file('image')->getClientOriginalName();
        //   $file_path = $request->file('image')->storeAs('public/image', $file_name);
        // }
        Adv::create([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' =>  $this->category_id,
            'user_id' => Auth::id(),
            'abstract' => $this->abstract,
            'description' => $this->description,
            //'img' => $this->img
        ]);

        session()->flash('tasks', 'Adv successfully updated.');
        $this->reset(['title', 'description']);

        return redirect()->route('welcome')->with('success', 'Annuncio aggiunta con successo!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.adv-create-form', compact('categories'));
    }
}
