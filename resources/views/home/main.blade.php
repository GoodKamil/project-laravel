@extends('layout.main')

@section('content')
    <h2 class="mt-4 ">Kontekst zalogowane użytkownika</h2>
    @includeIf(\App\Enum\UserRole::NUMBERTYPES[Auth::user()->positions->role-1].'.menu.dashboardMenu')
@endsection
