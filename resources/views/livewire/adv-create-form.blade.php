<div class="container m-5">
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

        <form wire:submit.prevent="store" class="w-75">
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
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple
                    class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                {{-- @error('temporary_images.*')
                <p class="text-danger mt-2">{{$message}}</p>    
                @enderror --}}
            </div>
            @if (!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Photo preview:</p>
                        <div class="row border border-4 border-info rounded py-4">
                            @foreach ($images as $key => $image)
                                <div class="col my-3">
                                    <div class="img-preview mx-auto rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                    <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto"
                                        wire:click="removeImage({{ $key }})">Cancella</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <button type="submit" class="btn btn-show">Crea annuncio</button>
        </form>
    </div>
</div>
