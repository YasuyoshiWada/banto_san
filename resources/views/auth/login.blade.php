@extends('layouts.app')
@section('styles')
{{-- <link rel="stylesheet" href="{{ mix('/css/login.css') }}"> --}}
@endsection
@section('content')

@include('layouts.modals.login-forget')

<style>
    .custom-bg-color {
  background-color: #99ccff;
}

.btn-color-change {
  background-color: #003366;
}

.right-section {
  height: 80vh;
  background-image: url("/images/login-image1.png");
  background-repeat: no-repeat;
  background-size: cover;
}

.text-account {
  font-size: 1.1vw;
}

.text-sign-up {
  font-size: 1.1vw;
  font-weight: bold;
}


</style>
<div class="container-fluid custom-bg-color"  style="height: 100vh;">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card-group">
                <div class="card mt-5 shadow" style="height: 80vh;">
                    {{-- <div class="card-header">{{ __('LOGIN') }}</div> --}}

                    <div class="card-body">
                        {{--insert LOGO--}}
                        <div class="text-center mb-4">
                            <img src="{{ asset('/images/banto-logo.jpeg')}}" alt="Logo" class="img-fluid">
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row ps-5">
                                <label for="username" class="col-md-4 col-form-label text-md-start">{{ __('USERNAME') }}</label>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group px-5">
                                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                    <input id="username" type="username" class="form-control form-control-lg text-center @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ENTER USERNAME">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row ps-5">
                                <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('PASSWORD') }}</label>
                            </div>
                            <div class="row">
                                <div class="input-group px-5">
                                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                    <input id="password" type="password" class="form-control form-control-lg text-center @error('password') is-invalid @enderror" name="password" placeholder="ENTER PASSWORD" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mt-5 px-5">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-color-change btn-lg shadow text-white">
                                            {{ __('LOGIN') }}
                                    </button>


                                    {{-- link of pop up forgot password page --}}
                                    {{-- @if (Route::has('password.request')) --}}

                                        <a class="btn btn-link text-end" data-bs-toggle="modal" data-bs-target="#login-forget">
                                            {{ __('Forgot Password?') }}
                                        </a>

                                    {{-- @endif --}}
                                </div>
                            </div>
                        </form>

                        <div class="row text-center mt-5">
                            <div class="col"></div>
                            <div class="col">
                                <p class="text-account text-muted">Don't have account?</p>
                            </div>
                            <div class="text-sign-up col m-0">
                                <a href="{{ route('register')}}" class="text-sign-up text-dark">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 shadow right-section">
                        <div class="text-center">
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@endsection
