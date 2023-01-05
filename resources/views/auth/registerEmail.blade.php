@extends('layout.main')

@section('content')
    <section class="vh-100 overflow-hidden">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{route('auth.checkEmailIsExists')}}">
                            @csrf
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sprawdzanie adres e-mail</p>
                            </div>
                            <div class="divider d-flex align-items-center my-4">
                            </div>
                            <div class="mb-4 mt-4">
                                <label for="name" class="form-label">{{ __('Adres-email') }}</label>
                                <input id="name" type="text" class="form-control @error('checkEmail') is-invalid @enderror" name="checkEmail" value="{{ old('checkEmail') }}" required autocomplete="on" autofocus>
                                @error('checkEmail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sprawdz') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{Storage::url('img/draw3.webp')}}"
                         class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>
@endsection
