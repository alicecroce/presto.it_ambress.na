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
            <a class="text-center category-box text-white d-flex justify-content-center align-items-center {{ $category->name }}-color"
                href="{{ route('categoryshow', compact('category')) }}">{{ ucFirst($category->name) }}</a>
        @endforeach
    </div>

</x-main>
