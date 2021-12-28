<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div>
        {{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm position-fixed top-0"
            style="background: #d4447c;z-index: 2000; min-width: 100%;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" style="width: 15%;" alt="Company logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul id="auth" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('home') }}">
                                    Index
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('images') }}">
                                    Imágenes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('documents') }}">
                                    Documents
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('comunication') }}">
                                    Comunicación
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('users') }}">
                                    Users
                                </a>
                            </li>
                            <li class="nav-item dropdown" id="logout-user">
                                <a id="user" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div id="user"></div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" onclick="logout()">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main style="margin-bottom: 0px">
            @yield('content')
        </main>
    </div>
</body>

</html>
