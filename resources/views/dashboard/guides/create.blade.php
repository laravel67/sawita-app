@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $sub }}</h5>
    </div>
    <div class="card-body">
        <form id="analysisForm" action="{{ route('guide.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pupuk_id" class="form-label">Pilih Pupuk:</label>
                <select name="pupuk_id" id="pupuk_id" class="form-control @error('pupuk_id') is-invalid @enderror">
                    @foreach ($pupuks as $pupuk)
                    <option value="{{ $pupuk->id }}" {{ old('pupuk_id')==$pupuk->id ? 'selected' : '' }}>
                        {{ $pupuk->name }}
                    </option>
                    @endforeach
                </select>
                @error('pupuk_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Panduan Penggunaan Pupuk:</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>
                @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-end">
                <a href="{{ route('guide.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button id="startAnalysisBtn" name="startAnalysisBtn" class="btn btn-primary" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/load.js') }}"></script>
@endpush