@extends('layout.main')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <input type="hidden" value="{{old('id_E',$result['id_E'])}}" name="id_E">
                        <input type="hidden" value="{{old('id_P',$result['id_P'])}}" name="id_P">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Rejestracja</p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Imie') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Nazwisko') }}</label>
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>
                                <input id="email" type="email" readonly class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email',$result['email']) }}" required autocomplete="email">
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
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Powtórz hasło') }}</label>
                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Rejestracja') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{Storage::url('img/draw1.webp')}}"
                         class="img-fluid" alt="Sample image">
                </div>
        </div>
        </div>
    </section>
@endsection
