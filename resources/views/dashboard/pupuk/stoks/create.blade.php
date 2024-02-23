@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('stok.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group mandatory mb-4">
                        <label class="form-label">Nama Pupuk</label>
                        <select name="pupuk_id" id="pupuk_id" class="form-control">
                            @foreach ($pupuks as $pupuk)
                            <option value="{{ $pupuk->id }}" {{ old('pupuk_id')==$pupuk->id ? 'selected' : '' }}>
                                {{ $pupuk->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mandatory">
                        <label class="form-label">Stok Pupuk</label>
                        <input type="number" class="form-control @error('stok_in') is-invalid @enderror" name="stok_in"
                            id="stok_in" value="{{ old('stok_id') }}">
                        @error('stok_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <hr> <!-- Move the <hr> inside the form if necessary -->
            <div class="d-md-flex align-items-center justify-content-end">
                <div class="text-end">
                    <a href="{{ route('pupuk.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection