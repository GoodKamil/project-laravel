@extends('layout.main')

@section('content')
    <div class="card">
        @if(!empty($user))
        <h5 class="card-header">{{ $user->first_name.' '.$user->last_name }}</h5>
        <div class="card-body">
            <ul>
                <li>Imię: {{ $user->first_name }}</li>
                <li>Nazwisko: {{ $user->last_name }}</li>
                <li>Email: {{ $user->email_user }}</li>
                <li>Stanowisko: {{ $user->positions->position }}</li>
            </ul>

            <a href="{{ route('admin.index') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
        @else
            <h5 class="card-header">Brak danych do wyświetlenia</h5>
        @endif
    </div>
@endsection
