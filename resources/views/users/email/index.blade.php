@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Dodaj wiadomość e-mail</h5>
        <div class="card-body">
            <form action="{{route('email.send')}}" method="post">
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
                    <label for="title" class="form-label">Tytuł wiadomości</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title') <div class="invalid-feedback">{{ $errors->get('title')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Treść wiadomości:</label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description" >{{old('description')}}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $errors->get('description')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mr-3">Wyślij</button>
                    <button type="submit"  formaction="{{ route('home.mainPage') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                </div>
            </form>

        </div>
    </div>
@endsection
