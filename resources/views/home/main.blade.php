@extends('layout.main')

@section('content')
    <h2 class="mt-4 ">Kontekst zalogowane użytkownika</h2>
    @can('isAdminOrSuperEmployee')
        @includeIf('AdminOrSuperEmployee.menu.dashboardMenu')
    @else
        @includeIf('employee.menu.dashboardMenu')
    @endcan
@endsection
