<div class="container my-5">
    <div class="d-flex justify-content-center">


        <form wire:submit.prevent="store" class="w-75">
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('ui.title') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    wire:model="title" minlength="4">
                @error('title')
                    <p class="text-danger mt-1">{{ __($message) }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">{{ __('ui.price') }}</label>
                <input type="number" step="0.01" value="0.00" placeholder="€ 0.00" class="form-control @error('price') is-invalid @enderror"
                    id="price" wire:model="price">
                @error('price')
                    <p class="text-danger mt-1">{{ __($message) }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="abstract">{{ __('ui.abstract') }}</label>
                <input type="text" class="form-control @error('abstract') is-invalid @enderror" id="abstract" wire:model="abstract">
                @error('abstract')
                    <p class="text-danger mt-1">{{ __($message) }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label " for="category_id">{{ __('ui.category') }}</label>
                <select wire:model="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option selected>{{ __('ui.category') }}</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucFirst($category->name) }}
                        </option>
                    @empty
                        {{ __('ui.noCateg') }}
                    @endforelse
                </select>
                @error('category_id')
                    <p class="text-danger mt-1">{{ __($message) }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">{{ __('ui.description') }}</label>
                <textarea wire:model="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                    <p class="text-danger mt-1">{{ __($message) }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple
                    class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
                @error('temporary_images.*')
                    <p class="text-danger mt-2">{{ __($message) }}</p>
                @enderror
            </div>
            @if (!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Anteprima immagine</p>
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

            <button type="submit" class="btn btn-show m-2">{{ __('ui.btnMake') }}</button>
        </form>
    </div>
</div>
