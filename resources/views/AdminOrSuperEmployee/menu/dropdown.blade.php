<a class="dropdown-item" href="{{route('home.mainPage')}}">
    {{ __('Panel') }}
</a>
<a class="dropdown-item" href="{{route('AdminOrSuperEmployee.index') }}">
    {{ __('Użytkownicy') }}
</a>
<a class="dropdown-item" href="{{route('AdminOrSuperEmployee.task.index')}}">
    {{ __('Zadania') }}
</a>
<a class="dropdown-item" href="{{route('users.data.show')}}">
    {{ __('Twój profil') }}
</a>
@can('isSuperEmployee')
    <a class="dropdown-item" href="{{route('employee.task.index')}}">
        {{ __('Twoje Zadania') }}
    </a>
@endcan
<a class="dropdown-item" href="{{route('AdminOrSuperEmployee.addUser')}}">
    {{ __('Dodaj użytkownika') }}
</a>
<a class="dropdown-item" href="{{route("email.index")}}">
    {{ __('Wyślij wiadomość') }}
</a>
<a class="dropdown-item" href="{{route('AdminOrSuperEmployee.addUser')}}">
    {{ __('Dodaj użytkownika') }}
</a>
<a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Wyloguj się') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
