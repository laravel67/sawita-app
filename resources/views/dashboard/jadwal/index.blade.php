@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('jadwal.create') }}" class="btn btn-primary"><i class="fas fa-clock"></i> Buat Jadwal</a>
    </div>
</div>
@if ($groupedJadwals->isNotEmpty())
@foreach ($groupedJadwals as $gardenId => $jadwalsByGarden)
<div class="card">
    <div class="card-header d-md-flex align-items-center justify-content-md-between">
        <div>
            <h5 class="card-title">Lahan : <strong>{{ $jadwalsByGarden->first()->garden->name }}</strong></h5>
            <h6 class="card-subtitle mb-2 text-muted">Lokasi : <strong><i class="fas fa-location"></i> {{
                    $jadwalsByGarden->first()->garden->lokasi }}</strong></h6>
        </div>
        @can('admin')
        <div>
            <form id="delete-form" action="{{ route('deletes', $gardenId) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="gardenId" value="{{ $gardenId }}">
                <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus Jadwal</button>
            </form>
        </div>
        @endcan
    </div>
    <div class="card-body mb-5">
        @foreach ($jadwalsByGarden->groupBy('tujuan') as $tujuan => $jadwalsByTujuan)
        <div class="table-responsive mb-5">
            <h6 class="card-subtitle mb-2 text-muted">Pemupukan: <strong>{{ $tujuan }}</strong></h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Waktu Pemupukan</th>
                        <th scope="col">Kategori Pemupukan</th>
                        <th scope="col">Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwalsByTujuan->sortBy('jadwal') as $i => $jadwal)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \Carbon\Carbon::parse($jadwal->jadwal)->translatedFormat('j F Y') }}</td>
                        <td>{{ $jadwal->tujuan }}</td>
                        <td>
                            @if ($jadwal->status === 1)
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                            @else
                            <span class="badge bg-light"><i class="fas fa-clock"></i> Belum</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                @if ($jadwal->status == 0)
                                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post">
                                    @method("put")
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm btn-status"><i
                                            class="fas fa-check-circle"></i></button>
                                </form>
                                @endif
                                <form id="delete-form" action="{{ route('jadwal.destroy', $jadwal->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete"><i
                                            class="fas fa-times-circle"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada jadwal pemupukan yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>
@endforeach
@else
<div class="card">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-info-circle"></i> Belum Ada Jadwal.
    </div>
</div>
@endif
@endsection