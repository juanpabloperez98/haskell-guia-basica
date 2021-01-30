<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo_haskell.png') }}" />
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    @yield('styles')
    <title>Guía de Haskell</title>
</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div style="width: 40px" class="d-inline-block">
                    <img class="d-inline-block" src="{{ asset('images/all/logo_haskell.png') }}" alt="logo_haskell">
                </div>
                <span class="ml-2">Guía del paradigma imperativo con Haskell</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#modulos">Módulos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer class="row mx-auto">
        <div class="col-lg-12 mx-auto text-md-center" style="max-width: 1111px">
            Universidad Tecnologica de Pereira
            <span style="display: block">© Todos los derechos reservados</span>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
