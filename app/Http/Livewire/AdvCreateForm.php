<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreAdvRequest;
use App\Models\Adv;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdvCreateForm extends Component
{
    use WithFileUploads;
    public $title, $category_id, $price, $abstract, $description, $temporary_images, $images = [];

    protected $rules = [
        'title' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'abstract' => 'required',
        'description' => 'max:500',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function store()
    {
        $this->validate();

        $this->adv = Category::find($this->category)->advs()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $this->adv->images()->create(['path' => $image->store('images', 'public')]);
            }
        }

        Adv::create([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' =>  $this->category_id,
            'user_id' => Auth::id(),
            'abstract' => $this->abstract,
            'description' => $this->description,
            'images' => $this->images = [],
            'temporary_images' => $this->images = [],

        ]);

        session()->flash('tasks', 'Adv successfully updated.');
        $this->reset(['title', 'description']);

        return redirect()->route('welcome')->with('success', 'Annuncio aggiunto con successo!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.adv-create-form', compact('categories'));
    }
}
