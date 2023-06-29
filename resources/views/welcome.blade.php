<x-main>
    <x-hero />
    <div id="success-message">
        @if (session('success'))
            <h4 class="fw-bold bg-success p-2 text-dark bg-opacity-50 border border-success rounded">
                {{ session('success') }}</h4>
        @endif
    </div>

    <div class="container parent my-5">
        @foreach ($categories as $category)
            <a class="text-center category-box text-white d-flex justify-content-center align-items-center {{$category->name}}-color"
                href="{{route('categoryshow', compact('category'))}}">{{$category->name}}</a>
        @endforeach




    </div>



</x-main>
