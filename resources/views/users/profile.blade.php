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
                                <img src="{{ asset('assets/compiled/jpg/2.jpg') }}" alt="Avatar" width="150">
                            </div>

                            <h3 class="mt-3">{{ $user->name }}</h3>
                            <p class="text-small"></p>
                        </div>
                        <form action="#" method="get">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone"
                                    value="083xxxxxxxxx">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gambar/Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image" onchange="previewImage()">
                                <div class="img-fluid">
                                    <img class="img-fluid" id="img-preview" width="200">
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
                        <form action="#" method="get">
                            <div class="form-group my-2">
                                <label for="current_password" class="form-label">Sandi Saat Ini</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" placeholder="Enter your current password"
                                    value="1L0V3Indonesia">
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
<script src="{{ asset('assets/js/script.js') }}"></script>
@endpush