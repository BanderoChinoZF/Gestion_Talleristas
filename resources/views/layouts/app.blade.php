<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link href="{{ asset('css') }}/administrador.css" rel="stylesheet">
    <link href="{{ asset('css') }}/datatables.css" rel="stylesheet">
    <link href="{{ asset('css') }}/home.css" rel="stylesheet">
    <link href="{{ asset('css') }}/login.css" rel="stylesheet">
    <link href="{{ asset('css') }}/select2.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />

</head>
<body>
    <div id="app">
        
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarCenteredExample"
            aria-controls="navbarCenteredExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarCenteredExample"
            >
            <a class="navbar-brand" href="#">
                <img
                    src="/img/logo-gestion.jpeg"
                    class="me-2"
                    height="50"
                    alt=""
                    loading="lazy"
                />
                <small>Fresnillo</small>
            </a>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <!-- @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif -->

                @else
                    
                    <section class="mb-4">
                        <!-- Facebook -->
                        <a
                        class="btn btn-primary color-base"
                        href="{{url("/Tallerista/inicio")}}"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fas fa-home"></i>   Home</a>
                
                        <!-- Twitter -->
                        <a
                        class="btn btn-primary color-base"
                        href="{{url('Tallerista/mostrar_lista_usuario/'.Auth::user()->id)}}"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fas fa-users"></i>   Sesión</a>
                
                        <!-- Google -->
                        <a
                        class="btn btn-primary color-base"
                        href="{{url('Tallerista/mostrar_lista_usuario_detalle/'.Auth::user()->id)}}"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fas fa-clipboard-list"></i>  Encuesta</a>

                        <!-- Instagram -->
                        <a
                        class="btn btn-primary color-base"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fas fa-poll-h"></i>  Resultados</a>
                
                    </section>
                    <!-- Section: Social media -->

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownMenuLink"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                            v-pre
                        >{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                          </ul>
                    </li>

                @endguest
            </ul>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <br><br><br>
    <main class="py-4">
        @yield('footer')
    </main>
</body>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/b02b2e8b3d.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/funciones.js') }}" defer></script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
@yield('scripts')
@stack('js')

</html>
