<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sawita|
        @if ($title)
        {{ $title }}
        @else
        {{ config('app.name') }}
        @endif
    </title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header my-0 py-0">
                        <h3 class="card-title text-center text-success">Sawita Raya</h3>
                        <img src="{{ asset('assets/img/login.jpg') }}" class="card-img-top" alt="Farm Image">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center">
                            @if(session('status'))
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            {{ session('status') }}
                            @else
                            Login
                            @endif
                        </h3>
                        <form id="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control @error('login') is-invalid @enderror" id="login"
                                    placeholder="" value="{{ old('login') }}" name="login" required>
                                <label class="text-sm" for="login">Email/Username</label>
                                @error('login')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="" name="password" required>
                                <label class="text-sm align-items-center" for="password">Kata Sandi</label>
                                @error('password')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="show-password">
                                <label class="form-check-label" for="show-password">
                                    Tampilkan Kata Sandi
                                </label>
                            </div>
                            <button id="login-button" type="submit" class="btn btn-success btn-block">
                                <span id="login-text">Login <i class="fas fa-sign-in-alt"></i></span>
                                <span id="login-spinner" class="d-none">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading....
                                </span>
                            </button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p>Create By Murtaki</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('show-password');
        showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
        passwordInput.type = 'text';
        } else {
        passwordInput.type = 'password';
        }
        });

        document.getElementById('login-form').addEventListener('submit', function(e){
        e.preventDefault();
        const loginButton = document.getElementById('login-button');
        const loginText = document.getElementById('login-text');
        const loginSpinner = document.getElementById('login-spinner');
        loginText.classList.add('d-none');
        loginSpinner.classList.remove('d-none');
        loginButton.disabled = true;
        setTimeout(function () {
        e.target.submit();
        loginText.classList.remove('d-none');
        loginSpinner.classList.add('d-none');
        loginButton.disabled = false;
        }, 2000);
        });
    </script>
</body>

</html>