@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <form id="analysisForm" action="{{ route('process.analize') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-4">
                <select class="form-select" id="garden_id" name="garden_id">
                    @foreach ($gardens as $garden)
                    <option value="{{ $garden->id }}" {{ old('garden_id')==$garden->id ? 'selected' : '' }}>
                        {{ $garden->name }}
                    </option>
                    @endforeach
                </select>
                <label class="text-sm" for="garden_id">Pilih Lahan yang akan dianalisis</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" id="jenis" name="jenis">
                    <option value="Tanah Gambut">Tanah Gambut</option>
                    <option value="Tanah Alluvial">Tanah Alluvial</option>
                    <option value="Tanah Laterit">Tanah Laterit</option>
                    <option value="Tanah Podzolik">Tanah Podzolik</option>
                </select>
                <label class="text-sm" for="jenis">Pilih Jenis Tanah</label>
            </div>
            <div class="form-floating mb-4">
                <input type="number" name="keasaman" class="form-control @error('keasaman')
                    is-invalid
                @enderror" id="keasaman" placeholder="keasaman" autocomplete="off">
                <label class="text-sm" for="keasaman">{{ __('Tingkat keasaman Tanah (pH)') }}</label>
                @error('keasaman')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="number" name="kelembaban" class="form-control @error('kelembaban')
                    is-invalid
                @enderror" id="kelembaban" placeholder="kelembaban" autocomplete="off">
                <label class="text-sm" for="kelembaban">{{ __('Tingkat kelembaban Tanah(%)') }}</label>
                @error('kelembaban')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-end">
                <div class="mb-2">
                    <button id="startAnalysisBtn" name="startAnalysisBtn" class="btn btn-primary" type="submit">
                        Mulai Analisis Lahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/load.js') }}"></script>
@endpush