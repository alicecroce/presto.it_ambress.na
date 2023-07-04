<x-main>

    <x-hero />

    <div id="success-message">
        @if (session('success'))
            <div class="m-2 p-2 d-flex justify-content-center">
                <span class="fw-bold bg-successo p-2 text-successo bg-opacity-50 border border-successo rounded">
                    {{ session('success') }}</span>
            </div>
        @endif
    </div>

    

    <div class="container parent my-5">
        @foreach ($categories as $category)
            <a class="text-center category-box text-white d-flex flex-column justify-content-center align-items-center {{ $category->slug }}-color"
                href="{{ route('categoryshow', compact('category')) }}">
                <i class="{{$category->icons}} fs-1"></i>
                <span>{{ ucFirst($category->name) }}</span>
            </a>
        @endforeach
    </div>

    <x-footer />

</x-main>
