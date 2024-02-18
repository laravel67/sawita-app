@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pupuk.update', $pupuk->id) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">Nama Pupuk</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid @enderror" placeholder="nama pupuk" name="name" id="name"
                            value="{{ old('name',$pupuk->name) }}">
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
                            value="{{ old('stok',$pupuk->stok) }}">
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
                    <input id="kegunaan" type="hidden" name="kegunaan" value="{{ old('kegunaan',$pupuk->kegunaan) }}">
                    <trix-editor input="kegunaan"></trix-editor>
                    @error('kegunaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mandatory">
                    <label class="form-label">Jelaskan Cara Pemakain Pupuk</label>
                    <input id="penggunaan" type="hidden" name="penggunaan"
                        value="{{ old('penggunaan',$pupuk->penggunaan) }}">
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
                        <input type="hidden" name="imgImage" value="{{ $pupuk->image }}">
                        <input type="file" class="form-control @error('image')
                            is-invalid @enderror" name="image" id="image" onchange="previewImage()">
                        <div class="img-fluid mt-3">
                            @if ($pupuk->image)
                            <img src="{{ asset('storage/'.$pupuk->image) }}" class="img-fluid" id="img-preview"
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
                </div>
                <hr>
                <div class="d-md-flex align-items-center justify-content-md-between">
                    <div class="form-group">
                        <div class="form-check mandatory">
                            <input type="checkbox" class="form-check-input" id="checkbox">
                            <label class="form-check-label form-label" for="checkbox">Yakin ingin menyimpan data
                                ini?</label>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('pupuk.index') }}" class="btn btn-outline-secondary">
                            Kembali
                        </a>
                        <button type="submit" id="btn-submit" class="btn btn-primary" disabled>
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