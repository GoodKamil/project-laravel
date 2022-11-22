@extends('layout.main')

@section('content')
    <div class="card">
        <h5 class="card-header">Zadanie</h5>
        <div class="card-body">
            <form action="#" method="post">
                @csrf
                <input type="hidden" name="idT" value="{{$}}">
                <div class="mb-3">
                    <label for="comment" class="form-label">Komentarz:</label>
                    <input type="text" class="form-control  @error('comment') is-invalid @enderror" id="comment" name="comment"  value="{{old('comment')}}">
                    @error('comment') <div class="invalid-feedback">{{ $errors->get('comment')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Opcjonalnie plik:</label>
                    <input class="form-control" type="file" id="formFile" name="formFile">
                    @error('formFile') <div class="invalid-feedback">{{ $errors->get('formFile')[0]}}</div>@enderror
                </div>
                <div class="mb-3">
                    <button type="submit"  formaction="{{  route('employee.task.index') }}" formmethod="GET" class="btn btn-light">Powrót</button>
                    <button type="submit" class="btn btn-primary mr-3">Dodaj</button>
                </div>
            </form>

        </div>
    </div>
@endsection
