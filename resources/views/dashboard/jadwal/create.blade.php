@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $sub }}</h5>
    </div>
    <div class="card-body">
        <form id="analysisForm" action="{{ route('generate') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="garden_id" class="form-label">Pilih Lahan</label>
                <select class="form-control" name="garden_id" id="garden_id">
                    @foreach ($gardens as $garden)
                    <option value="{{ $garden->id }}">{{$garden->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jenis_tanah" class="form-label">Jenis Tanah</label>
                <select class="form-control" name="jenis_tanah" id="jenis_tanah">
                    <option value="Tanah Gambut">Tanah Gambut</option>
                    <option value="Tanah Alluvial">Tanah Alluvial</option>
                    <option value="Tanah Laterit">Tanah Laterit</option>
                    <option value="Tanah Podzolik">Tanah Podzolik</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="keasaman" class="form-label">{{ __('Tingkat Keasaman Tanah (pH)') }}</label>
                <input type="number" class="form-control @error('keasaman') is-invalid @enderror" id="keasaman"
                    name="keasaman">
                @error('keasaman')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kelembaban" class="form-label">{{ __('Tingkat Kelembaban Tanah (%)') }}</label>
                <input type="number" class="form-control @error('kelembaban') is-invalid @enderror" id="kelembaban"
                    name="kelembaban">
                @error('kelembaban')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tujuan" class="form-label">Tujuan Pemupukan ?</label>
                <select class="form-control" name="tujuan" id="tujuan">
                    <option value="Buah">Buah</option>
                    <option value="Batang">Batang</option>
                    <option value="Tanah">Tanah</option>
                </select>
            </div>
            <div class="text-end">
                <a href="{{ route('jadwal.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button id="startAnalysisBtn" name="startAnalysisBtn" class="btn btn-primary" type="submit">
                    Generate Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/load.js') }}"></script>
@endpush