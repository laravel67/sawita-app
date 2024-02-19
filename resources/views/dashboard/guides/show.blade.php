@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="alert alert-success" role="alert">
            <strong><i class="fas fa-info-circle"></i> Perhatian</strong>
            <p>Silahkan baca banduan sebelum menggunakan pupuk</p>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="align-items-center d-flex p-2">
                <a class="btn" href="{{ route('guide.index') }}">Kembali</a>
                <a class="btn text-success" href="{{ route('guide.edit', $guide->id) }}">Ubah</a>
                <form id="delete-form" action="{{ route('guide.destroy', $guide->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn text-danger btn-delete">Hapus</button>
                </form>
            </div>
            <div class="card-content">
                @if ($guide->pupuk->image)
                <img class="card-img-bottom img-fluid" src="{{ asset('storage/'.$guide->pupuk->image) }}"
                    alt="Card image cap" style="height: 20rem; object-fit: cover;">
                @else
                <img class="card-img-bottom img-fluid" src="{{ asset('images.avif') }}" alt="Card image cap"
                    style="height: 20rem; object-fit: cover;">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $guide->pupuk->name }}</h4>
                        <a href="#" class="badge bg-primary">{{ $guide->pupuk->category->name }}</a>
                    </div>
                    <article>
                        <p class="card-text">
                            {!! $guide->body !!}
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection