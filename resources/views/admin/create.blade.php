@extends('layout.main')

@section('content')
    <div class="card">
            <h5 class="card-header">Dodaj użytkownika</h5>
            <div class="card-body">
                <form action="{{route('admin.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres E-mail</label>
                        <input type="email" class="form-control  @error('user_email') is-invalid @enderror" id="email" name="user_email" placeholder="name@example.com" value="{{old('user_email')}}">
                        @error('user_email') <div class="invalid-feedback">{{ $errors->get('user_email')[0]}}</div>@enderror
                    </div>
                    <div class="mb-5">
                        <label for="positions" class="form-label">Stanowisko:</label>
                        <select class="form-control @error('position') is-invalid @enderror" aria-label="Default select example" name="position" id="positions">
                            <option value=" " selected>Wybierz</option>
                            @foreach($positions as $row)
                                <option @selected((int)old('position')===$row->id_P) value="{{$row->id_P}}">{{$row->position}}</option>
                            @endforeach
                        </select>
                        @error('position') <div class="invalid-feedback">{{ $errors->get('position')[0]}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mr-3">Dodaj</button>
                        <button type="submit"  formaction="{{ route('admin.index') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                    </div>
                </form>

            </div>
    </div>
@endsection
