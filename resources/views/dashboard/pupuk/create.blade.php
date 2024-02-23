@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pupuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Nama Pupuk</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid @enderror" placeholder="nama pupuk" name="name" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Kategori / Jenis</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : ''
                                }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Jumlah Pupuk</label>
                        <input type="number" class="form-control @error('stok')
                                            is-invalid @enderror" placeholder="masukkan stok" name="stok" id="stok"
                            value="{{ old('stok') }}">
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror">
                            <option value="Karung" {{ old('satuan')=='Karung' ? 'selected' : '' }}>Karung</option>
                            <option value="Kilogram" {{ old('satuan')=='Kilogram' ? 'selected' : '' }}>Kilogram</option>
                        </select>
                        @error('satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mandatory">
                    <label class="form-label">Jelaskan Manfaat/Kegunaan Pupuk</label>
                    <input id="manfaat" type="hidden" name="manfaat" value="{{ old('manfaat', ) }}">
                    <trix-editor input="manfaat"></trix-editor>
                    @error('manfaat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mandatory">
                    <label class="form-label">Jelaskan Cara Pemakain Pupuk</label>
                    <input id="penggunaan" type="hidden" name="penggunaan" value="{{ old('penggunaan') }}">
                    <trix-editor input="penggunaan"></trix-editor>
                    @error('penggunaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group">
                        <label class="form-label">Gambar/Image</label>
                        <input type="file" class="form-control @error('image')
                            is-invalid @enderror" name="image" id="image" onchange="previewImage()">
                        <div class="img-fluid mt-3">
                            <img class="img-fluid" id="img-preview" width="200">
                        </div>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="d-md-flex align-items-center justify-content-end">
                    <div class="text-end">
                        <a href="{{ route('pupuk.index') }}" class="btn btn-outline-secondary">
                            Kembali
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
<script src="{{ asset('script.js') }}"></script>
@endpush