<x-main>
    <div id="success-message">
        @if (session('success'))
            <h4 class="fw-bold bg-success p-2 text-dark bg-opacity-50 border border-success rounded">{{ session('success') }}</h4>
        @endif
    </div>

</x-main>
