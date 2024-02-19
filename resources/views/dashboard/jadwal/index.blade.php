@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('jadwal.create') }}"><i class="fas fa-clock"></i> Tambah Jadwal</a>
    </div>
    <div class="card table-responsive">
        @if ($groupedJadwals->isNotEmpty())
        @foreach ($groupedJadwals as $gardenId => $jadwals)
        <div class="card-body">
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <h6>Lahan : <strong class="badge bg-primary">{{ $jadwals->first()->garden->name
                        }}</strong></h6>
                <h6>Lokasi : <strong class="badge bg-primary"><i class="fas fa-location"></i> {{
                        $jadwals->first()->garden->lokasi }}</strong></h6>
                <form id="delete-form" action="{{ route('deletes', $gardenId) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="gardenId" value="{{ $gardenId }}">
                    <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus Jadwal</button>
                </form>
            </div>
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
                    @forelse ($jadwals->sortBy('jadwal') as $i => $jadwal)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ \Carbon\Carbon::parse($jadwal->jadwal)->translatedFormat('j F Y') }}</td>
                        <td>{{ $jadwal->tujuan }}</td>
                        <td>
                            @if ($jadwal->status ===1)
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span>
                            @else
                            <span>
                                <span class="badge bg-light"><i class="fas fa-clock"></i> Belum</span>
                            </span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                @if ($jadwal->status==0)
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
                        <td colspan="3">Tidak ada jadwal pemupukan yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endforeach
        @else
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-info-circle"></i> Belum Ada Jadwal.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection