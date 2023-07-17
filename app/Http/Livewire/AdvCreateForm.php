<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreAdvRequest;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Contracts\Session\Session;

class AdvCreateForm extends Component
{
    use WithFileUploads;
    public $title, $category_id, $price, $abstract, $description, $validated, $temporary_images, $images = [], $adv, $image;

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
                // $this->adv->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "advs/{$this->adv->id}";
                $newImage = $this->adv->images()->create(['path' => $image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
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


        session()->flash('adv', 'Adv successfully updated.');
        $this->reset(['title',  'price', 'category_id', 'abstract', 'description', 'images', 'temporary_images', 'image']);
        
        $message = '';

            switch (session('locale')) {
                case 'en':
                $message = "Announcement successfully add! It'll be visible after the revisor's review!";
                    break;
                case 'fr':
                $message = "Announce chargé avec succès! Serais visible après de la revisiòn du reviseur";
                    break;
                case 'es':
                $message = "Anuncio añadido satifactoriamente, estarà visible prévia aprovación de un revisór";
                    break;
                
                default:
                $message = 'Annuncio aggiunto con successo, sarà visibile dopo l\'approvazione di un nostro revisore!';
                    break;
            }


        return redirect()->route('welcome')->with('success', $message);
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.adv-create-form', compact('categories'));
    }
}
