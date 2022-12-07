<div class="sb-sidenav-menu-heading mt-6 color_link"><h5>Użytkownicy:</h5></div>
<div class="w-100 border__menu bacground_menu_home">
    <div class="d-sm-flex justify-content-start align-items-center">
        <a class=" nav-link pt-4 pb-4 mr-5 color_link" href="{{route('AdminOrSuperEmployee.index')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Użytkownicy
        </a>
        <a class=" nav-link pt-4 pb-4 mr-5  color_link" href="{{route('AdminOrSuperEmployee.task.index')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
            Zadania
        </a>
        <a class="nav-link pt-4 pb-4 color_link" href="{{route('users.data.show')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
            Twój profil
        </a>
    </div>
</div>


<div class="sb-sidenav-menu-heading mt-3 color_link"><h5>Operacje:</h5></div>
<div class="w-100 bacground_menu_home">
    <div class="d-sm-flex justify-content-start align-items-center">
        <a class="nav-link pt-4 pb-4 mr-5 color_link" href="{{route('AdminOrSuperEmployee.addUser')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
            Dodaj użytkownika
        </a>

        <a class="nav-link pt-4 pb-4 mr-5 color_link" href="{{route('AdminOrSuperEmployee.task.create')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
            Dodaj zadanie
        </a>
        <a class="nav-link pt-4 pb-4 mr-5 color_link" href="{{route("email.index")}}">
            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
            Wyślij wiadomość
        </a>

        <a class="nav-link pt-4 pb-4 color_link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="sb-nav-link-icon"><i class="fas fa-sign"></i></div>
            Wyloguj się
        </a>
    </div>
</div>
