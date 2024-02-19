@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('guide.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Panduan</a>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ( $guides as $guide )
            <div class="col">
                <div class="card">
                    @if ($guide->pupuk->image)
                    <img src="{{ asset('storage/'.$guide->pupuk->image) }}" class="card-img-top equal-image"
                        alt="{{ $guide->pupuk->image }}">
                    @else
                    <img src="{{ asset('images.avif') }}" class="card-img-top equal-image">
                    @endif
                    <div class="d-flex mb-0">
                        <a class="btn text-success" href="{{ route('guide.edit', $guide->id) }}">Ubah</a>
                        <form id="delete-form" action="{{ route('guide.destroy', $guide->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn text-danger btn-delete">Hapus</button>
                        </form>
                    </div>
                    <div class="card-body mt-0">
                        <h5 class="card-title">{{ $guide->pupuk->name }}</h5>
                        <p class="card-text">{{ $guide->excerpt }}</p>
                        <a href="{{ route('guide.show',$guide->id ) }}" class="btn btn-primary">Baca panduan...</a>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
    <div class="card-footer">
        {{ $guides->links() }}
    </div>
</div>
@endsection