@extends('layouts.app')
@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="card-body">
            <div class="d-md-flex align-item-center justify-content-start">
                <div class="col-md-3 mb-2">
                    <a class="btn btn-primary" href="{{ route('stok.create') }}"><i class="fas fa-plus"></i>Tambah
                        Stok</a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama pupuk</th>
                            <th>Stok Masuk</th>
                            <th>Stok Keluar</th>
                            <th>Total Stok</th>
                            <th>Tanggal & Bulan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stoks as $index => $stok)
                        <tr>
                            <td>{{$stoks->firstItem()+$index }}</td>
                            <td>{{ $stok->pupuk->name }}</td>
                            <td>{{ $stok->stok_in }}</td>
                            <td>{{ $stok->stok_out }}</td>
                            <td>{{ $stok->total }}</td>
                            <td>{{ $stok->updated_at->format('d F Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('stok.edit',$stok->id) }}"
                                        class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i></a>
                                    <form id="delete-form" action="{{ route('stok.destroy', $stok->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <td>Belum ada stok.</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $stoks->links() }}
        </div>
    </div>
</div>
@endsection