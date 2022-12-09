<a class="dropdown-item" href="{{route('home.mainPage')}}">
    {{ __('Panel') }}
</a>
<a class="dropdown-item" href="{{route('users.data.show')}}">
    {{ __('Twój profil') }}
</a>
<a class="dropdown-item" href="{{route('employee.task.index')}}">
    {{ __('Twoje zadania') }}
</a>
<a class="dropdown-item" href="{{route("email.index")}}">
    {{ __('Wyślij wiadomośćć') }}
</a>
<a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Wyloguj się') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

