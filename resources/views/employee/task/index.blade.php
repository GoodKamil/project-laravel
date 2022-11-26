@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Twoje Zadania</h5>
        <div class="card-body">
            <div class="d-lg-flex justify-content-start align-items-center flex-wrap" style="gap:15px">
                @forelse($tasks as $row)
                    <div class="card {{($row->priority) ? 'borderCard' : ''}}" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$row->Title}}</h5>
                            <p class="card-text">{{$row->Description}}</p>
                            <a  href="{{route('employee.task.show',['id'=>$row->id_T])}}" class="btn btn-primary">Zobacz</a>
                        </div>
                    </div>
                @empty
                    <h5 class="card-header w-100">Brak zadań do wyświetlenia</h5>
                @endforelse
            </div>
        </div>
    </div>
@endsection
