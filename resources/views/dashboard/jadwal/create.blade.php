@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $sub }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('generate') }}" method="POST">
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
                <label for="keasaman" class="form-label">{{ __('Tingkat Keasaman Tanah (pH)') }}</label>
                <input type="number" class="form-control" id="keasaman" name="keasaman">
            </div>
            <div class="mb-4">
                <label for="kelembaban" class="form-label">{{ __('Tingkat Kelembaban Tanah (%)') }}</label>
                <input type="number" class="form-control" id="kelembaban" name="kelembaban">
            </div>
            <div class="mb-4">
                <label for="tujuan" class="form-label">Tujuan Pemupukan ?</label>
                <select class="form-control" name="tujuan" id="tujuan">
                    <option value="Buah">Buah</option>
                    <option value="Batang">Batang</option>
                    <option value="Tanah">Tanah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Generate Jadwal</button>
        </form>
    </div>
</div>
@endsection