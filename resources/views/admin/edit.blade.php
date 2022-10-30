@extends('layout.main')

@section('content')
    <div class="card">
        @if(!empty($user))
            <h5 class="card-header">Edycja użytkownika</h5>
            <div class="card-body">
                <form action="{{route('admin.update',['idU' => $user->id_U])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Imie</label>
                        <input type="text" class="form-control  @error('first_name') is-invalid @enderror" id="firstName" name="first_name" value="{{old('first_name',$user->first_name)}}">
                        @error('first_name') <div class="invalid-feedback">{{ $errors->get('first_name')[0]}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Nazwisko</label>
                        <input type="text" class="form-control  @error('last_name') is-invalid @enderror" id="lastName" name="last_name" value="{{old('last_name',$user->last_name)}}">
                        @error('last_name') <div class="invalid-feedback">{{ $errors->get('last_name')[0]}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{old('email',$user->email_user)}}" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="positions" class="form-label">Stanowiska:</label>
                        <select class="form-control @error('position') is-invalid @enderror" aria-label="Default select example" id="positions" name="position">
                           @foreach($positions as $row)
                            <option @selected(old('position',$user->position)===$row->id_P)  value="{{$row->id_P}}">{{$row->position}}</option>
                           @endforeach
                         </select>
                        @error('position') <div class="invalid-feedback">{{ $errors->get('position')[0]}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mr-3">Edytuj</button>
                        <button type="submit"  formaction="{{ route('admin.index') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                    </div>
                </form>

            </div>
        @else
            <h5 class="card-header">Brak danych do edytowania</h5>
        @endif
    </div>
@endsection
