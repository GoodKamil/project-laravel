@extends('layout.main')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Resetowanie hasła</p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                        </div>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adres e-mail') }}</label>
                            <input id="email" type="email" readonly class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Hasło') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Powtórz hasło') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resetuj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{Storage::url('img/draw1.svg')}}"
                         class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>
@endsection
