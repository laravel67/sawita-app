@extends('layouts.app')
@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <h4>Hasil Generate Penjadwalan Pemupukan</h4>
        </div>
        <div class="card-body">
            <ul class="list-group mb-3">
                <div class="alert alert-info" role="alert">
                    <strong><i class="fas fa-map"></i> {{ __('Data Lahan')}}</strong>
                </div>
                <li class="list-group-item"><strong>Lahan :</strong> {{ $garden['name'] }}</li>
                <li class="list-group-item"><strong>Jenis Tanah:</strong> {{ $jenisTanah }}</li>
                <li class="list-group-item"><strong>Keasaman Tanah:</strong> {{ $keasaman }} pH</li>
                <li class="list-group-item"><strong>Kelembaban Tanah:</strong> {{ $kelembaban }}%</li>
                <li class="list-group-item"><strong>Pemupukan:</strong> {{ $tujuan }}</li>
            </ul>
            <ul class="list-group mb-3">
                <div class="alert alert-info" role="alert">
                    <strong><i class="fas fa-clock"></i> {{ __('Jadwal')}}</strong>
                </div>
                @foreach($jadwalPemupukan as $tanggal)
                <li class="list-group-item">{{ $tanggal->translatedFormat('l, j F Y') }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer text-end">
            <form action="{{ route('jadwal.store') }}" method="post">
                @csrf
                <input type="hidden" name="garden_id" value="{{ $garden['id'] }}">
                <input type="hidden" name="keasaman" value="{{ $keasaman }}">
                <input type="hidden" name="kelembaban" value="{{ $kelembaban }}">
                <input type="hidden" name="tujuan" value="{{ $tujuan }}">
                @foreach($jadwalPemupukan as $tanggal)
                <input type="hidden" name="jadwal[]" value="{{ $tanggal }}">
                @endforeach
                <a href="{{ route('jadwal.create') }}" class="btn btn-outline-light">Generate Ulang</a>
                <button class="btn btn-primary" type="submit">Simpan Jadwal</button>
            </form>
        </div>
    </div>
</div>
@endsection