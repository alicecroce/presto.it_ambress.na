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
    public $title, $category_id, $price, $abstract, $description, $validated, $image, $temporary_images, $images = [], $adv;

    protected $rules = [
        'title' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'abstract' => 'required',
        'description' => 'max:500',
        'images.*' => 'image|max:1024', // il .* è la validazione di liveWire
        'temporary_images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere formato immagine',
        'temporary_images.*.max' => 'L\'immagine dev\'essere max 1 mb',
        'images.image' => 'I file devono essere formato immagine',
        'images.max' => 'L\'immagine dev\'essere max 1 mb',
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

        $category_id = Category::find($this->category_id);
        $this->adv = $category_id->advs()->create([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' =>  $this->category_id,
            'user_id' => Auth::id(),
            'abstract' => $this->abstract,
            'description' => $this->description,
        ]);


        if (count($this->images)) {
            foreach ($this->images as $image) {
                $this->adv->images()->create(['path' => $image->store('images', 'public')]);
                // $newFileName = "advs/{$this->adv->id}";
                // $newImage = $this->adv->images()->create(['path' => $image->store($newFileName, 'public')]);
            }
        }

        // Adv::create([
        //     'title' => $this->title,
        //     'price' => $this->price,
        //     'category_id' =>  $this->category_id,
        //     'user_id' => Auth::id(),
        //     'abstract' => $this->abstract,
        //     'description' => $this->description,
        //     'image' => $this->image,
        //     'images' => $this->images = [],
        //     'temporary_images' => $this->images = [],

        // ]);

        session()->flash('tasks', 'Adv successfully updated.');
        $this->reset(['title',  'price', 'category_id', 'abstract', 'description']);

        return redirect()->route('welcome')->with('success', 'Annuncio aggiunto con successo, sarà visibile dopo l\'approvazione di un nostro revisore!');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.adv-create-form', compact('categories'));
    }
}
