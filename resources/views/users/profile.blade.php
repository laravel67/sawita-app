@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile</h3>
            </div>
        </div>
    </div>
    <hr>
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="img-fluid">
                                @if ($user->image)
                                <img src="{{ asset('storage/'.$user->image) }}" alt="Avatar" width="150">
                                @else
                                <img src="{{ asset('user.svg') }}" alt="Avatar" width="150">
                                @endif
                            </div>

                            <h4 class="mt-3">{{ $user->name }}</h4>
                            <small class="badge bg-primary fw-normal text-light">{{ $user->role }}</small>
                        </div>
                        <hr>
                        <form action="{{ route('account.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama Lengkap</label>
                                            <div class="position-relative">
                                                <input type="text" name="name" class="form-control @error('name')
                                                    is-invalid
                                                @enderror" value="{{ old('name', $user->name) }}">
                                                <div class="form-control-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Username</label>
                                            <div class="position-relative">
                                                <input type="text" name="username" class="form-control @error('username')
                                                    is-invalid
                                                @enderror" value="{{ old('username', $user->username) }}">
                                                <div class="form-control-icon">
                                                    <i class="fas fa-user-circle"></i>
                                                </div>
                                            </div>
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text" name="email" class="form-control @error('email')
                                                    is-invalid
                                                @enderror" value="{{ old('email', $user->email) }}">
                                                <div class="form-control-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Phone</label>
                                            <div class="position-relative">
                                                <input type="text" name="contact" class="form-control @error('contact')
                                                    is-invalid
                                                @enderror" value="{{ old('contact', $user->contact) }}">
                                                <div class="form-control-icon">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            @error('contact')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Alamat</label>
                                            <div class="position-relative">
                                                <input type="text" name="address" class="form-control @error('address')
                                                    is-invalid
                                                @enderror" value="{{ old('address', $user->address) }}">
                                                <div class="form-control-icon">
                                                    <i class="fas fa-map-marker"></i>
                                                </div>
                                            </div>
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gambar/Image</label>
                                <input type="hidden" name="imageOld" id="imageOld" value="{{ $user->image }}">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image" onchange="previewImage()">
                                <div class="img-fluid mt-3">
                                    @if ($user->image)
                                    <img src="{{ asset('storage/'.$user->image) }}" class="img-fluid" id="img-preview"
                                        width="200">
                                    @else
                                    <img class="img-fluid" id="img-preview" width="200">
                                    @endif
                                </div>
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ganti Kata Sandi</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reset.password') }}" method="POST">
                            @csrf
                            <div class="form-group my-2">
                                <label for="current_password" class="form-label">Sandi Saat Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" placeholder="Enter your current password" value="">
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">Sandi Baru</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="New password" value="">
                            </div>
                            <div class="form-group my-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js')
<script src="{{ asset('script.js') }}"></script>
@endpush