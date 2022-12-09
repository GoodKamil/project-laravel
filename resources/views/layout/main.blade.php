<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>@yield('title')</title>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/5244237eec.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       @vite(['resources/css/app.css']);
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand  w-auto" href="{{ route('home.mainPage') }}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                        </li>
                    @endif

                    @if (Route::has('admin.checkEmail'))
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('admin.checkEmail') }}">{{ __('Rejestracja') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown mr-5 display_dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->first_name.' '.Auth::user()->last_name }}

                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @can('isAdminOrSuperEmployee')
                                @includeIf('AdminOrSuperEmployee.menu.dropdown')
                            @else
                                @includeIf('employee.menu.dropdown')
                            @endcan
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <div id="layoutSidenav">
            @auth
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @section('sidebar')
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                @can('isAdminOrSuperEmployee')
                                    @includeIf('AdminOrSuperEmployee.menu.sidebar')
                                @else
                                    @includeIf('employee.menu.sidebar')
                                @endcan
                            </div>
                        </div>
                    @show
                </nav>
            </div>
            @endauth
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <script   src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
