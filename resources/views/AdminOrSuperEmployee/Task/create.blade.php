@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Dodaj zadanie</h5>
        <div class="card-body">
            <form action="{{route('AdminOrSuperEmployee.task.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="selectUser" class="form-label">Wybierz pracownika:</label>
                    <select class="form-control  @error('selectUsers') is-invalid @enderror" aria-label="lista pracowników" id="selectUser"  name="selectUser">
                        @foreach($users as $row)
                            <option @selected(old('selectUser')===$row->id_U)  value="{{$row->id_U}}">{{$row->first_name .' '. $row->last_name}}</option>
                        @endforeach
                    </select>
                    @error('selectUser') <div class="invalid-feedback">{{ $errors->get('selectUser')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Tytuł zadania</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title') <div class="invalid-feedback">{{ $errors->get('title')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Opis zadania:</label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description" >{{old('description')}}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $errors->get('description')[0]}}</div>@enderror
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="dateOd" class="form-label">Data od:</label>
                        <input type="datetime-local" class="form-control @error('dateOd') is-invalid @enderror"  aria-label="Termin od" name="dateOd" id="dateOd" value="{{old('dateOd',date('Y-m-d H:i'))}}">
                        @error('dateOd') <div class="invalid-feedback">{{ $errors->get('dateOd')[0]}}</div>@enderror
                    </div>
                    <div class="col">
                        <label for="dateDo" class="form-label">Data do:</label>
                        <input type="datetime-local" class="form-control @error('dateDo') is-invalid @enderror"  aria-label="Termin do" name="dateDo" id="dateDo" value="{{old('dateDo',date('Y-m-d H:i'))}}">
                        @error('dateDo') <div class="invalid-feedback">{{ $errors->get('dateDo')[0]}}</div>@enderror
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="1" id="priority" name='priority'>
                    <label class="form-check-label" for="priority">Priorytet</label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mr-3">Dodaj</button>
                    <button type="submit"  formaction="{{ route('AdminOrSuperEmployee.index') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                </div>
            </form>

        </div>
    </div>
@endsection
