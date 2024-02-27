@extends('layouts.app')
@section('content')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('garden.update', $garden->id) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Nama Lahan') }}</label>
                        <input type="text" class="form-control @error('name')
                            is-invalid @enderror" name="name" id="name" value="{{ old('name', $garden->name) }}"
                            autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Lokasi Lahan') }}</label>
                        <select class="form-control form-control-select @error('lokasi') is-invalid @enderror"
                            name="lokasi" id="lokasi">
                        </select>
                        @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Luas Lahan') }}</label>
                        <input type="number" class="form-control @error('luas')
                            is-invalid @enderror" name="luas" id="luas" value="{{ old('luas', $garden->luas) }}">
                        @error('luas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Jumlah Batang') }}</label>
                        <input type="number" class="form-control @error('jumlah_batang')
                            is-invalid @enderror" name="jumlah_batang" id="jumlah_batang"
                            value="{{ old('jumlah_batang', $garden->jumlah_batang) }}">
                        @error('jumlah_batang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Satuan Luas Lahan') }}</label>
                        <select class="form-control form-control-select @error('satuan') is-invalid @enderror"
                            name="satuan" id="satuan">
                            <option value="Hektar">Hektar</option>
                        </select>
                        @error('satuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-3">
                    <div class="form-group mandatory">
                        <label class="form-label">{{ __('Jenis Tanah') }}</label>
                        <select class="form-control form-control-select @error('jenis_tanah') is-invalid @enderror"
                            name="jenis_tanah" id="jenis_tanah">
                            <option value="Tanah Gambut" {{ old('jenis', $garden->jenis_tanah)=='Tanah Gambut' ?
                                'selected'
                                : '' }}>Tanah Gambut</option>
                            <option value="Tanah Alluvial" {{ old('jenis', $garden->jenis_tanah)=='Tanah Alluvial'
                                ? 'selected' : '' }}>Tanah Alluvial
                            </option>
                            <option value="Tanah Laterit" {{ old('jenis', $garden->jenis_tanah)=='Tanah Laterit' ?
                                'selected'
                                : '' }}>Tanah Laterit
                            </option>
                            <option value="Tanah Podzolik" {{ old('jenis', $garden->jenis_tanah)=='Tanah Podzolik'
                                ? 'selected' : '' }}>Tanah Podzolik
                            </option>
                        </select>
                        @error('jenis_tanah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-md-flex align-items-center justify-content-md-end">
                    <div class="text-end">
                        <a href="{{ route('garden.index') }}" class="btn btn-outline-secondary">
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
@include('dashboard.garden.script')
<script src="{{ asset('assets/js/script.js') }}"></script>
@endpush