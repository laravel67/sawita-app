@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="form form-vertical" action="{{ route('setting.update', $setting->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Nama Aplikasi</label>
                                        <div class="position-relative">
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $setting->name) }}">
                                            <div class="form-control-icon">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative">
                                            <input name="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('name', $setting->email) }}">
                                            <div class="form-control-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Kontak</label>
                                        <div class="position-relative">
                                            <input name="contact" type="text"
                                                class="form-control @error('contact') is-invalid @enderror"
                                                value="{{ old('name', $setting->contact) }}">
                                            <div class="form-control-icon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group has-icon-left">
                                        <label>Alamat</label>
                                        <div wire:model='address' class="position-relative">
                                            <input name="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ old('name', $setting->name) }}">
                                            <div class="form-control-icon">
                                                <i class="fas fa-map-marker"></i>
                                            </div>
                                        </div>
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Tentang Sawita</label>
                                    <input id="about" type="hidden" name="about"
                                        value="{{ old('about', $setting->about) }}">
                                    <trix-editor input="about" class="@error('about') is-invalid @enderror">
                                    </trix-editor>
                                    @error('about')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Logo Perusahaan</label>
                                    <input type="hidden" name="imageOld" value="{{ $setting->image }}">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image" onchange="previewImage()">
                                    <div class="img-fluid mt-3">
                                        @if ($setting->image)
                                        <img src="{{ asset('storage/'.$setting->image) }}" class="img-fluid"
                                            id="img-preview" width="200">
                                        @else
                                        <img class="img-fluid" id="img-preview" width="200">
                                        @endif
                                    </div>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Tambah Galeri</h6>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('galery.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title Galeri</label>
                                    <input type="text" name="title" id="title" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="imageGallery" class="form-label">Gambar/Image</label>
                                    <input type="file" id="imageGallery" class="form-control" name="image[]" multiple>
                                    <small class="text-muted">Bisa mengupload 2 atau lebih gambar</small>
                                </div>
                                <div id="preview" class="p-4"></div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Buat Slide</h6>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('home.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Slide</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title')
                                        is-invalid
                                    @enderror" value="{{ old('title') }}" />
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Deskripsi Slide</label>
                                    <textarea name="body" id="body" class="form-control @error('body')
                                            is-invalid
                                        @enderror">{{ old('body') }}
                                </textarea>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar/Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="slide" onchange="previewSlide()">
                                    <div class="img-fluid mt-3">
                                        <img class="img-fluid" id="slide-preview" width="200">
                                    </div>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script src="{{ asset('script.js') }}"></script>
<script>
    const formGallery = document.getElementById('uploadForm');
    const fileInputGallery = document.getElementById('imageGallery');
    const previewGallery = document.getElementById('preview');

    fileInputGallery.addEventListener('change', () => {
        previewGallery.innerHTML = ''; // Clear previous previews
        const files = fileInputGallery.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = () => {
                const img = document.createElement('img');
                img.src = reader.result;
                img.alt = file.name;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                img.style.padding = '10px';
                previewGallery.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });

    formGallery.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(formGallery);
        try {
            const response = await fetch(formGallery.action, {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            console.log(data);
        } catch (error) {
            console.error('Error:', error);
        }
    });
</script>
<script>
    function previewSlide(){
    const image      = document.querySelector('#slide');
    const imgPreview = document.querySelector('#slide-preview');
    imgPreview.style.display ='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0])
    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endpush