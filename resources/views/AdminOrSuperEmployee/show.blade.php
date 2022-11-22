@extends('layout.main')

@section('content')
    <div class="card">
        @if(!empty($user))
        <h5 class="card-header">{{ $user->first_name.' '.$user->last_name }}</h5>
        <div class="card-body">
            <ul>
                <li>Imię: {{ $user->first_name }}</li>
                <li>Nazwisko: {{ $user->last_name }}</li>
                <li>Email: {{ $user->email_users->email }}</li>
                <li>Stanowisko: {{ $user->positions->position }}</li>
                @if($user->isDataUser())
                    <li>Kraj zamieszkania: {{ $user->users_data->country }}</li>
                    <li>Miejsce zamieszkania: {{ $user->users_data->city }}</li>
                    <li>Kod pocztowy: {{ $user->users_data->zip_code }}</li>
                    <li>Adres zamieszkania: {{ $user->users_data->address }}</li>
                    <li>Województwo: {{ $user->users_data->province }}</li>

                @endif
            </ul>

            <a href="{{ route('AdminOrSuperEmployee.index') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
        @else
            <h5 class="card-header">Brak danych do wyświetlenia</h5>
        @endif
    </div>
@endsection
