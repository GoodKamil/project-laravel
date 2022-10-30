<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>@yield('title')</title>
        <meta name="description" content=""/>
        <script src="https://kit.fontawesome.com/5244237eec.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       @vite(['resources/css/app.css']);
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home.mainPage') }}"></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @section('sidebar')
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                @include('shared.sidebar')
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            Sidenav Footer
                        </div>
                    @show
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Fluid footer</div>
                            <div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       @vite(['resources/js/app.js'])
    </body>
</html>