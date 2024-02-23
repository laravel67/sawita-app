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
                    <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100 active"
                                    src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=870&amp;q=80"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1632949107130-fc0d4f747b26?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2 mt-md-4 gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100 active"
                                    src="https://images.unsplash.com/photo-1633008808000-ce86bff6c1ed?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyN3x8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=870&amp;q=80"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                            <a href="#">
                                <img class="w-100"
                                    src="https://images.unsplash.com/photo-1632949107130-fc0d4f747b26?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw3OHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection