@extends('layout.main')

@section('content')
    <h2 class="mt-4 ">Kontekst zalogowane użytkownika</h2>
    @if(Session::has('success'))
        <div class="alert alert-success mt-4 mb-2 text-center" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @can('isAdminOrSuperEmployee')
        @includeIf('AdminOrSuperEmployee.menu.dashboardMenu')
    @else
        @includeIf('employee.menu.dashboardMenu')
    @endcan
@endsection
