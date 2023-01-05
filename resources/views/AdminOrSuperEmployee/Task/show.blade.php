@extends('layout.main')

@section('content')
    <div class="card">
        @if(!empty($task))
            <h5 class="card-header {{ (($task->Done) ? 'bg-success' : '') }}">Zadanie</h5>
            <div class="card-body">
                <ul>
                    <li>Temat zadania: {{ $task->Title }}</li>
                    <li>Opis zadania: {{ $task->Description }}</li>
                    <li>Priorytet: {{ ($task->priority) ? 'Tak' : 'Nie'}} </li>
                    <li>Ukończone: {{ ($task->Done) ? 'Tak' : 'Nie' }}</li>
                    <li>Termin zadania: {{ $task->DateFrom.' - '.$task->DateTo }} </li>
                    <li>Data utworzenia zadania: {{$task->created_at}}</li>
                    <li>Kto utworzył zadanie: {{$task->usersAdd[0]->first_name.' '.$task->usersAdd[0]->last_name}}</li>
                </ul>
                @if($task->isSend())
                    <div style="border-top:1px solid grey;margin-bottom: 2rem;">
                        <ul style="margin-top: 1rem;">
                            <li>Zadanie wykonane: {{$task->send_task->created_at}}</li>
                            <li>Komentarz do zadania: {{$task->send_task->comment}}</li>
                            <li>Dodany plik do zadania: <a href="{{route('task.download',['id'=>$task->id_T])}}">Plik_Zadanie</a></li>
                        </ul>
                    </div>
                @endif
                <a href="{{ route('AdminOrSuperEmployee.task.index') }}" class="btn btn-light">Powrót</a>
                @if(!$task->isDone() && $task->isSend())
                 <a href="#" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('doneTask-form').submit();">Zadanie wykonane</a>
                    <form id="doneTask-form" action="{{ route('AdminOrSuperEmployee.task.doneTask',['id'=>$task->id_T]) }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </div>
        @else
            <h5 class="card-header">Brak informacji o zadaniu</h5>
        @endif
            @if(Session::has('error'))
                <div class="alert alert-danger mt-2 mb-2 text-center" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success mt-2 mb-2 text-center" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
    </div>
@endsection
