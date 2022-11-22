@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Dane użytkownika</h5>
        <div class="card-body">
            <form action="{{route('users.data.doUpdateDataUser')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="country" class="form-label">Państwo:</label>
                    <input type="text" class="form-control  @error('country') is-invalid @enderror" id="country" name="country"  value="{{old('country',$userData->country)}}">
                    @error('country') <div class="invalid-feedback">{{ $errors->get('country')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adres:</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address"  value="{{old('address',$userData->address)}}">
                    @error('address') <div class="invalid-feedback">{{ $errors->get('address')[0]}}</div>@enderror
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="city" class="form-label">Miasto:</label>
                    <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city"  value="{{old('city',$userData->city)}}">
                    @error('city') <div class="invalid-feedback">{{ $errors->get('city')[0]}}</div>@enderror
                    </div>
                    <div class="col">
                        <label for="zip_code" class="form-label">Kod pocztowy:</label>
                        <input type="text" class="form-control  @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code"  value="{{old('zip_code',$userData->zip_code)}}">
                        @error('zip_code') <div class="invalid-feedback">{{ $errors->get('zip_code')[0]}}</div>@enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Województwo:</label>
                    <input type="text" class="form-control  @error('province') is-invalid @enderror" id="province" name="province"  value="{{old('province',$userData->province)}}">
                    @error('province') <div class="invalid-feedback">{{ $errors->get('province')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <button type="submit"  formaction="{{  route('users.data.show') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                    <button type="submit" class="btn btn-primary mr-3">Edytuj</button>
                </div>
            </form>

        </div>
    </div>
@endsection
