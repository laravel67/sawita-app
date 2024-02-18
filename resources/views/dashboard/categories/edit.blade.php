@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="col mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Jenis Pupuk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="jenis pupuk" name="name" id="name" value="{{ old('name', $category->name) }}"
                            autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-md-flex align-items-center justify-content-md-end">
                    <div class="text-end">
                        <a href="{{ route('category.index') }}" class="btn btn-danger">
                            <i class="bi bi-x-circle d-flex d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </a>
                        <button type="submit" id="btn-submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/script.js') }}"></script>
@endpush