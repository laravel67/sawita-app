@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $sub }}</h5>
    </div>
    <div class="card-body">
        @if ($analisis->isNotEmpty())
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form id="analysisForm" action="{{ route('generate') }}" method="POST">
            @csrf
            <div class="form-floating mb-4">
                <select class="form-select" id="garden_id" name="garden_id">
                    <option>-</option>
                    @foreach ($analisis as $analis)
                    <option value="{{ $analis->id }}">{{ $analis->garden->name }}</option>
                    @endforeach
                </select>
                <label class="text-sm" for="garden_id">Pilih Lahan yang akan dianalisis</label>
            </div>
            <div class="form-floating mb-4">
                <input readonly type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror"
                    id="jenis" placeholder="jenis">
                <label class="text-sm" for="jenis">{{ __('Jenis Tanah') }}</label>
                @error('jenis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input readonly type="text" name="keasaman" class="form-control @error('keasaman') is-invalid @enderror"
                    id="keasaman" placeholder="keasaman" autocomplete="off" step="0.1" min="0" max="14">
                <label class="text-sm" for="keasaman">{{ __('Tingkat keasaman Tanah (pH)') }}</label>
                @error('keasaman')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input readonly type="text" name="kelembaban"
                    class="form-control @error('kelembaban') is-invalid @enderror" id="kelembaban"
                    placeholder="kelembaban" autocomplete="off">
                <label class="text-sm" for="kelembaban">{{ __('Tingkat kelembaban Tanah(%)') }}</label>
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
        @else
        <div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Silahkan melakukan analisis lahan
            terlebih dahulu.</div>
        @endif
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/load.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#garden_id').change(function() {
            var selectedId = $(this).val();
            var selectedAnalize = {!! $analisis->toJson() !!}.find(function(analize) {
                return analize.id == selectedId;
            });
            if (selectedAnalize) {
                $('#jenis').val(selectedAnalize.jenis);
                $('#keasaman').val(selectedAnalize.keasaman);
                $('#kelembaban').val(selectedAnalize.kelembaban);
            } else {
                $('#jenis').val('');
                $('#keasaman').val('');
                $('#kelembaban').val('');
            }
        });
    });
</script>
@endpush