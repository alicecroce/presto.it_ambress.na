<div class="container my-5">
    <div id="confirm" class="d-none">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{ __('ui.attention') }}!</h4>
            <p>{{ __('ui.confMessage') }}</p>
            <hr>
            <div class="d-flex justify-content-center">
                <form wire:submit.prevent="update">
                    <button type="submit" id="btn-yes" class="btn btn-success m-3">{{ __('ui.yes') }}</button>
                </form>
                <button type="submit" data-bs-dismiss="alert" class="btn btn-danger m-3">{{ __('ui.no') }}</button>

            </div>

        </div>
    </div>
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
                <label for="title" class="form-label">{{ __('ui.title') }}</label>
                <input type="text" class="form-control" id="title" wire:model="title" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">{{ __('ui.price') }}</label>
                <input type="number" step="0.01" value="0.00" placeholder="€ 0.00" class="form-control"
                    id="price" wire:model="price" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="abstract">{{ __('ui.abstract') }}</label>
                <input type="text" class="form-control" id="abstract" wire:model="abstract" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="category_id">{{ __('ui.category') }}</label>
                <select wire:model="category_id" id="category_id" class="form-control" required>
                    <option selected>{{ __('ui.category') }}</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucFirst($category->name) }}
                        </option>
                    @empty
                        {{ __('ui.noCateg') }}
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">{{ __('ui.description') }}</label>
                <textarea wire:model="description" id="description" class="form-control"></textarea>
            </div>

            <!-- Edit Immagini  -->
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple
                    class="form-control shadow @error('temporay_images.*') is-invalid"@enderror placeholder="img" />

            </div>

            @if (!empty($images) || !empty($imagesFromDb))
                <div class="row">
                    <div class="col-12">
                        <p>Anteprima</p>
                        <div class="row border border-4 border-info rounded py-4">
                            @foreach ($images as $key => $image)
                                <div class="col my-3">
                                    <div class="img-preview mx-auto rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                        <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto"
                                        wire:click="removeImage({{ $key }})">Cancella</button>
                                </div>
                            @endforeach
                            @if (!empty($imagesFromDb))
                                @foreach ($imagesFromDb as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto rounded"
                                            style="background-image: url({{ $image->getUrl() }});"></div>
                                        <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto"
                                            wire:click="removeImageFromDb({{ $key }})">Cancella
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif






            <button type="submit" class="btn btn-show m-2" id="edit-btn">{{ __('ui.btnEdit') }}</button>
            <button wire:click="destroy({{ $adv }})" class="btn btn-danger">{{ __('ui.btnDelete') }}</button>

        </form>
    </div>

</div>
