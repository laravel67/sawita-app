@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div>
        @if(Session::has('logged'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-info-circle"></i> {{ Session::get('logged') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @else
        <h3>{{ __('Sawita Raya') }}</h3>
        @endif
        <hr>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/sawit4.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block bg-dark rounded-3 opacity-75">
                    <h2 class="text-light">Second slide label</h2>
                    <strong class="text-light">Some representative placeholder content for the second
                        slide.</strong>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/sawit4.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block bg-dark rounded-3 opacity-75">
                    <h2 class="text-light">Second slide label</h2>
                    <strong class="text-light">Some representative placeholder content for the second
                        slide.</strong>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/sawit4.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block bg-dark rounded-3 opacity-75">
                    <h2 class="text-light">Second slide label</h2>
                    <strong class="text-light">Some representative placeholder content for the second
                        slide.</strong>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
</div>
@endsection