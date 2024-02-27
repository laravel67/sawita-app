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
<div class="d-flex justify-content-center mb-5">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($slides as $key => $slide)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" @if($key===0)
                class="active" @endif aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($slides as $key => $slide)
            <div class="carousel-item @if($key === 0) active @endif">
                <img src="{{ asset('storage/'.$slide->image) }}" class="d-block" alt="{{ $slide->title }}"
                    style="width: 80rem; height:40rem">
                <div class="carousel-caption d-none d-md-block bg-dark rounded-3 opacity-75">
                    <h5 class="text-light">{{ $slide->title }}</h5>
                    <p class="text-light">{{ $slide->body }}</p>
                </div>
            </div>
            @endforeach
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
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5017.5868199399865!2d101.63891178511608!3d-1.058600596175451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b8dbb7c25b567%3A0xd20a958cf685b0f8!2sUNIVERSITAS%20DHARMAS%20INDONESIA!5e1!3m2!1sid!2sid!4v1709064065574!5m2!1sid!2sid"
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
</div>
@endsection