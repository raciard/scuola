<div class="dropdown">
    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">
        <i class="fas fa-globe"></i>
    </a>
    <div class="dropdown-menu">
        @foreach(App\Language::get() as $i => $lang)
            <a class="dropdown-item" href="{{ route('locale', ['locale' => $lang->code]) }}">{{ $lang->name }}</a>
        @endforeach
    </div>
</div>