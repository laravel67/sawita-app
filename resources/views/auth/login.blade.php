@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h2 class="text-primary mb-4 text-center">{{ __('Login') }}</h2>
                <form id="authentication" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('login') is-invalid @enderror"
                            placeholder="Email/Username" name="login" id="login" autofocus required autocomplete="off">
                        <div class="form-control-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left">
                        <input type="password"
                            class="form-control form-control-xl @error('password') is-invalid @enderror"
                            placeholder="Kata Sandi" name="password" id="password" required>
                        <div class="form-control-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end mb-3 mt-1">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{
                            old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="remember">{{ __('Ingatkan saya') }}
                        </label>
                    </div>
                    <div class="btn-group d-flex">
                        <button id="btnAuth" name="btnAuth" type="submit"
                            class="btn btn-primary col-11 btn-lg shadow-lg">
                            <strong>{{ __('Masuk') }}</strong>
                        </button>
                        <div class="btn btn-primary  btn-lg shadow-lg disabled">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection