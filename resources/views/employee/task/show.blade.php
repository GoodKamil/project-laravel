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
                          <li>Dodany plik do zadania: <a target="_bland" href="{{route('task.download',['id'=>$task->id_T])}}">Plik_Zadanie</a></li>
                      </ul>
                    </div>
                @endif
                <a href="{{ route('employee.task.index') }}" class="btn btn-light">Powrót</a>
                @if(!$task->isSend())
                    <a href="#" class="btn btn-primary" id="showForm">Oddaj zadanie</a>
                @endif
            </div>
        @else
            <h5 class="card-header">Brak informacji o zadaniu</h5>
        @endif
    </div>
    <div class="card mt-5 {{($errors->any()) ?: 'display-form' }}" id="form">
        <div class="card-body">
            <form action="{{route('employee.task.handOverTheTask')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idT" value="{{$task->id_T}}">
                @error('idT') <div class="invalid-feedback">{{ $errors->get('idT')[0]}}</div>@enderror
                <div class="mb-3">
                    <label for="comment" class="form-label">Komentarz:</label>
                    <input type="text" class="form-control  @error('comment') is-invalid @enderror" id="comment" name="comment"  value="{{old('comment')}}">
                    @error('comment') <div class="invalid-feedback">{{ $errors->get('comment')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Opcjonalnie plik:</label>
                    <input class="form-control" type="file" id="formFile" name="formFile" style="padding: 3px">
                    @error('formFile') <div class="invalid-feedback">{{ $errors->get('formFile')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mr-3">Dodaj</button>
                </div>
            </form>
        </div>
    <div>
        <script>
            const form=document.getElementById('form');
            const showForm=document.getElementById('showForm');

            if(form && showForm) {
                showForm.addEventListener('click', function () {
                    if (form.classList.contains('display-form'))
                        form.classList.remove('display-form');
                    else
                        form.classList.add('display-form')
                })
            }
        </script>
@endsection
