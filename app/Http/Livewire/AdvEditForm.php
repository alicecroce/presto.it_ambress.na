<?php

namespace App\Http\Livewire;

use App\Models\Adv;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\File;

class AdvEditForm extends Component
{
    use WithFileUploads;
    public $title, $price, $abstract, $description, $images = [], $temporary_images, $imagesFromDb;
    public Adv $adv;
    public $category;
    public $category_id;

    protected $rules = [
        'title' => 'required|string|min:3',
        'price' => 'required',
        'abstract' => 'required|string|max:200',
        'description' => 'required|string|max:500',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',

    ];

    public function mount()
    {
        $this->title = $this->adv->title;
        $this->price = $this->adv->price;
        $this->category = $this->adv->category->id;
        $this->abstract = $this->adv->abstract;
        $this->description = $this->adv->description;
        $this->imagesFromDb = $this->adv->images()->get();
    }

    public function update()
    {
        $this->validate();
        $this->adv->update([
            'title' => $this->title,
            'price' => $this->price,
            'category_id' => $this->category,
            'abstract' => $this->abstract,
            'description' => $this->description,
        ]);

        if (count($this->images)) {

            foreach ($this->images as $image) {
                $newFileName = "advs/{$this->adv->id}";
                $newImage = $this->adv->images()->create(['path' => $image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->adv->save();
        $this->adv->setAccepted(null);

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function removeImageFromDb($key)
    {
        if ($this->imagesFromDb->hasAny($key)) {
            $this->imagesFromDb->get($key)->delete();
            $this->imagesFromDb->forget($key);
        }
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
