<form action="{{ route('set_language_locale', $lang) }}" method="POST" class="">
    @csrf
    <button type="submit" class="nav-link p-0 m-0" style="background-color: transparent; border:none">
        <span> <i class="flag-icon flag-icon-{{ $nation }}"></i></span>
    </button>
</form>
