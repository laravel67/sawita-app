@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ route('jadwal.create') }}"><i class="fas fa-clock"></i> Buat Jadwal</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Lahan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Waktu Pemupukan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection