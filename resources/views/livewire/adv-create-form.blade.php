<div class="container m-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="store" class="w-75">
        <div class="mb-3">
            <label for="title" class="form-label">Inserisci il titolo del tuo articolo</label>
            <input type="text" class="form-control" id="title" wire:model="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Inserisci il prezzo del tuo articolo</label>
            <input type="text" class="form-control" id="price" wire:model="price">
        </div>
        <div class="mb-3">
            <label class="form-label" for="abstract">Inserisci una breve descrizione</label>
            <input type="text" class="form-control" id="abstract" wire:model="abstract">
        </div>
        <div class="mb-3">
            <label class="form-label" for="category_id">Inserisci una categoria</label>
            <select wire:model="category_id" id="category_id" class="form-control">
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}
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
        <button type="submit" class="btn btn-outline-dark">Crea annuncio</button>
    </form>
</div>