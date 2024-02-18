@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('Hasil Analisis') }}</h4>
    </div>
    <div class="card-body">
        <ul>
            <li>Jenis Tanah: <strong>{{ $data['jenis'] }}</strong></li>
            <li>Keasaman: <strong>{{ $data['keasaman'] }}</strong> pH</li>
            <li>Kelembaban: <strong>{{ $data['kelembaban'] }}</strong>%</li>
            <li>Luas Lahan: <strong>{{ $luas }}</strong> Hektar</li>
            <li>Pupuk Per Batang: <strong>{{ $pupuk_perbatang }}</strong> Kg/Batang</li>
            <li>Pupuk Dibutuhkan: <strong>{{ $pupuk_dibutuhkan }}</strong> Kilogram</li>
        </ul>
        <article>
            <div class="alert alert-success fade show" role="alert">
                <strong><i class="fas fa-info-circle"></i> Notes:</strong>
                <p>{!! $results !!} {{ $pemupukanInterval }}</p>
            </div>
        </article>
        <form action="{{ route('result.store') }}" method="post">
            @csrf
            <input type="hidden" name="jenis" value="{{ $data['jenis'] }}">
            <input type="hidden" name="keasaman" value="{{ $data['keasaman'] }}">
            <input type="hidden" name="kelembaban" value="{{ $data['kelembaban'] }}">
            <input type="hidden" name="garden_id" value="{{ $garden_id }}">
            <input type="hidden" name="pupuk_perbatang" value="{{ $pupuk_perbatang }}">
            <input type="hidden" name="pupuk_dibutuhkan" value="{{ $pupuk_dibutuhkan }}">
            <input type="hidden" name="notes" value="{{ $results }}">
            <input type="hidden" name="jadwal_mupuk" value="{{ $pemupukanInterval }}">
            <div class="text-end">
                <a class="btn btn-outline-secondary" href="{{ route('analize.index') }}">Analisis Ulang</a>
                <button class="btn btn-primary" type="submit">Simpan Hasil Analisis</button>
            </div>
        </form>
    </div>
</div>
@endsection