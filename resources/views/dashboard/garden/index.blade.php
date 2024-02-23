@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $sub }}</h4>
    </div>
    <div class="card-body">
        <div class="d-md-flex align-item-center justify-content-around">
            <div class="col-md-3 mb-md-2">
                <a class="btn btn-primary" href="{{ route('garden.create') }}"><i class="fas fa-plus"></i>Tambah</a>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Pencarian...">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lahan</th>
                        <th>Lokasi Lahan</th>
                        <th>Luas Lahan</th>
                        <th>Jenis Tanah</th>
                        <th>Jumlah Batang/Pohon</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gardens as $i=> $garden)
                    <tr>
                        <td>{{ $gardens->firstItem()+$i }}</td>
                        <td>
                            {{ $garden->name }}
                        </td>
                        <td>{{ $garden->lokasi }}</td>
                        <td>{{ $garden->luas }} {{ $garden->satuan }}</td>
                        <td>{{ $garden->jenis_tanah }}</td>
                        <td>{{ $garden->jumlah_batang }} Batang</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('garden.edit',$garden->id) }}"
                                    class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i></a>
                                <form id="delete-form" action="{{ route('garden.destroy', $garden->id) }}"
                                    method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection