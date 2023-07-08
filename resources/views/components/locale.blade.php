<form action="{{ route('set_language_locale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style="background-color: transparent; border:none">
        <span> <i class="flag-icon flag-icon-{{ $nation }}"></i></span>
    </button>
</form>
