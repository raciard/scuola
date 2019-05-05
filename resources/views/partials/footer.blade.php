<footer class="fixed-bottom">
<div class="container d-flex py-3">
    <div class="text-muted mr-auto">
        Made with <i class="fas fa-heart text-danger"></i> & PHP by <a href="//gablab.eu">Gabriele Assentato</a>.<br />
        Copyright &copy; {{ date('Y') }} - All rights reserved - <a href="{{ route('license') }}">License</a>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        @include('partials.locale')
    </div>
</div>
</footer>