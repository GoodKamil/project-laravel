<a class="nav-link" href="{{route('home.mainPage')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>
<div class="sb-sidenav-menu-heading">Użytkownicy</div>
<a class="nav-link" href="{{route('users.data.show')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Twój profil
</a>
<a class="nav-link" href="{{route('employee.task.index')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
    Twoje zadania
</a>


<div class="sb-sidenav-menu-heading">Operacje</div>
<a class="nav-link" href="{{route("email.index")}}">
    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
    Wyślij wiadomość
</a>

<a class="nav-link" href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <div class="sb-nav-link-icon"><i class="fas fa-sign"></i></div>
    Wyloguj się
</a>

