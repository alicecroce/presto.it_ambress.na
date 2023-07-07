<div class="container m-5 text-center ">
    <div class="d-flex justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form wire:submit.prevent="update" class="w-75 was-validated">
            <div class="mb-3">
                <label for="title" class="form-label">Inserisci il titolo del tuo articolo</label>
                <input type="text" class="form-control" id="title" wire:model="title" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Inserisci il prezzo del tuo articolo</label>
                <input type="number" step="0.01" value="0.00" placeholder="€ 0.00" class="form-control"
                    id="price" wire:model="price" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="abstract">Inserisci una breve descrizione</label>
                <input type="text" class="form-control" id="abstract" wire:model="abstract" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="category_id">Inserisci una categoria</label>
                <select wire:model="category_id" id="category_id" class="form-control" required>
                    <option selected>Scegli una categoria</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucFirst($category->name) }}
                        </option>
                    @empty
                        Nessuna categoria
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Inserisci informazioni aggiuntive</label>
                <textarea wire:model="description" id="description" class="form-control"></textarea>
            </div>   
            
            <button type="submit" class="btn btn-show">Modifica annuncio</button>
            <button wire:click="destroy({{$adv}})" class="btn btn-danger">Elimina annuncio</button>
        
        </form>
    </div>

</div>
