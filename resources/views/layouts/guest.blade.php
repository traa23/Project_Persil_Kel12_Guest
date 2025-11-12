<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title', 'Sistem Informasi Persil')</title>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('guest-tamplate/assets/css/main.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Header -->
    <header id="header" @if(!isset($isHome)) class="alt" @endif>
        <div class="logo">
            <a href="{{ route('guest.persil.index') }}">Sistem Persil <span>Pertanahan</span></a>
        </div>
        <a href="#menu">Menu</a>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="{{ route('guest.persil.index') }}">Home</a></li>
            <li><a href="{{ route('guest.persil.create') }}">Tambah Data</a></li>
        </ul>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
            </ul>
        </div>
    </footer>

    <div class="copyright">
        Sistem Informasi Persil Pertanahan &copy; {{ date('Y') }}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('guest-tamplate/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('guest-tamplate/assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('guest-tamplate/assets/js/skel.min.js') }}"></script>
    <script src="{{ asset('guest-tamplate/assets/js/util.js') }}"></script>
    <script src="{{ asset('guest-tamplate/assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
