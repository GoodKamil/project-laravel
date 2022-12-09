@extends('layout.main')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success mt-2 mb-2 text-center" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="card">
        <h5 class="card-header">Zadania</h5>
        <div class="card-body">
                <div class="d-lg-flex justify-content-start align-items-center flex-wrap" style="gap:15px">
                @forelse($tasks as $row)
                        <div id="card-{{$row->id_T}}" class="card mb-3 {{($row->isDone()) ? 'border-success' : '' }}" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$row->Title}}</h5>
                                <p class="card-text">{{$row->Description}}</p>
                                @if(!$row->isDone())
                                <a href="{{route('AdminOrSuperEmployee.task.edit',['idT'=>$row->id_T])}}" class="btn btn-primary">Edytuj</a>
                                @endif
                                <a data-id="{{$row->id_T}}"  href="#" class="btn btn-danger delete_method">Usuń</a>
                            </div>
                        </div>
                    @empty
                        <h5 class="card-header w-100">Brak zadań do wyświetlenia</h5>
                    @endforelse
             </div>
        </div>
    </div>
    @can('isAdminOrSuperEmployee')
        <script type="text/javascript">
            const URL = "{{url('/deleteTask')}}"
            const TITLE='Czy na pewno chcesz usunąć wybrane zadanie?'
            const CLASS='delete-animation'
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite(['resources/js/delete.js'])
    @endcan
@endsection
