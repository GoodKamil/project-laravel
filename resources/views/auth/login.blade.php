@extends('layout.main')

@section('content')
    <section class="vh-100 overflow-hidden">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Logowanie</p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Wprowadz adres-email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Hasło</label>
                            <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" required
                                   placeholder="Wprowadz hasło" />
                            @error('password')--}}
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-body">Zapomniałeś hasła?</a>
                            @endif
                        </div>

                        <div class="text-center text-lg-start mt-4 mb-3 pt-2">
                            <button type="submit" class="btn btn-primary"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Zaloguj się</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Nie posiadasz konta? <a href="{{ route('admin.checkEmail') }}"
                                                                                              class="link-danger">Zarejestruj się</a></p>
                        </div>

                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{Storage::url('img/draw2.svg')}}"
                         class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>
@endsection
