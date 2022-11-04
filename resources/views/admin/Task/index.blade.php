@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Zadania</h5>
        <div class="card-body">

            @if(!empty($tasks))
                <div class="d-lg-flex justify-content-between align-items-center flex-wrap" style="gap:15px">
                @foreach($tasks as $row)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$row->Title}}</h5>
                                <p class="card-text">{{$row->Description}}</p>
                                <a href="{{route('admin.task.edit',['idT'=>$row->id_T])}}" class="btn btn-primary">Edytuj</a>
                                <a href="#" class="btn btn-danger">Usuń</a>
                            </div>
                        </div>
             @endforeach
             </div>
             @else
                 <h5 class="card-header">Brak zadań do wyświetlenia</h5>
             @endif
        </div>
    </div>
@endsection
