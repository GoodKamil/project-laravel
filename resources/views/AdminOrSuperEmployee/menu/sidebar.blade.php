<a class="nav-link" href="{{route('home.mainPage')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>
<div class="sb-sidenav-menu-heading">Użytkownicy</div>
<a class="nav-link" href="{{route('AdminOrSuperEmployee.index')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Użytkownicy
</a>
<a class="nav-link" href="{{route('AdminOrSuperEmployee.task.index')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
    Zadania
</a>
<a class="nav-link" href="{{route('users.data.show')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Twój profil
</a>
@can('isSuperEmployee')
    <a class="nav-link" href="{{route('employee.task.index')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
        Twoje Zadania
    </a>
@endcan


<div class="sb-sidenav-menu-heading">Operacje</div>
<a class="nav-link" href="{{route('AdminOrSuperEmployee.addUser')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
    Dodaj użytkownika
</a>
<a class="nav-link" href="{{route('AdminOrSuperEmployee.task.create')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
    Dodaj zadanie
</a>
<a class="nav-link" href="{{route("email.index")}}">
    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
    Wyślij wiadomość
</a>

<a class="nav-link" href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <div class="sb-nav-link-icon"><i class="fas fa-sign"></i></div>
    Wyloguj się
</a>

