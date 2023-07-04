<x-main>


    <div id="success-message">
        @if (session('success'))
            <div class="d-flex  a justify-content-center">
                <div class="alert alert-success w-75 lign-items-center text-center" role="alert">
                    <span class="bi bi-check-circle m-2"></span>
                    messaggio di successo
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>

    <x-hero />





    <div class="container parent my-5">
        @foreach ($categories as $category)
            <a class="text-center category-box text-white d-flex flex-column justify-content-center align-items-center {{ $category->slug }}-color"
                href="{{ route('categoryshow', compact('category')) }}">
                <i class="{{ $category->icons }} fs-1"></i>
                <span>{{ ucFirst($category->name) }}</span>
            </a>
        @endforeach
    </div>

    <x-footer />

</x-main>
