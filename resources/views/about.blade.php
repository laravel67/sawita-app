@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">About</h5>
                </div>
                <div class="card-body">
                    <div class="row gallery">
                        <div class="mt-2 mt-md-0 mb-md-0 mb-3 text-center">
                            @if ($show->image)
                            <img src="{{ asset('storage/'.$show->image) }}" class="img-fluid">
                            @else
                            <img src="{{ asset('images.avif') }}" alt="" srcset="">
                            @endif
                        </div>
                        <article>
                            <p align="justify">{!! $show->about !!}</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Galerry</h5>
                </div>
                <div class="card-body">
                    @foreach ($galleries as $gallery)
                    <div class="row gallery mb-3">
                        <h6>{{$gallery->title }}</h6>
                        @foreach (json_decode($gallery->images) as $image)
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2 p-2">
                            <img class="w-100 active" src="{{ asset('storage/' . $image) }}"
                                data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@endsection