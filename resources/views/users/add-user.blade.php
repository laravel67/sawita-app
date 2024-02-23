@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="name">Name Lengkap</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" autofocus required value="{{ old('name') }}">
                                    <div class="form-control-icon">
                                        <i class="fas fa-person"></i>
                                    </div>
                                </div>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="email">Alamat Email</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" required value="{{ old('email') }}">
                                    <div class="form-control-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="username">Username</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" required value="{{ old('username') }}">
                                    <div class="form-control-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                @error('username')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="password">Kata Sandi Baru</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required>
                                    <div class="form-control-icon">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </div>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group has-icon-left">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" required>
                                    <div class="form-control-icon">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </div>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#name').on('input', function() {
            var name = $(this).val().trim();
            var firstName = name.split(' ')[0].toLowerCase().replace(/\s/g, '');
            var randomNum = Math.floor(Math.random() * 90 + 10);
            var username = firstName + '.' + randomNum;
    $('#username').val(username);
    $.ajax({
        type: 'POST',
        url: '/check-username',
        data: {
            _token: '{{ csrf_token() }}',
            username: username
        },
        success: function(data) {
            if (data.exists) {
                $('#username-error').text('Username sudah digunakan');
            } else {
                $('#username-error').text('');
            }
        }
    });
});
});
</script>
@endpush