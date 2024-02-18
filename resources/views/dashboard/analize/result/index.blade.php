@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Comments</h4>
                        </div>
                        <div class="card-body">
                            @forelse ($results as $result)
                            <h1>{{ $result->garden->name }}</h1>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart-visitors-profile" style="min-height: 317.7px;">
                <h4>Visitors Profile</h4>
                <div>
                    Grafik
                </div>
            </div>
        </div>
    </div>
</div>
@endsection