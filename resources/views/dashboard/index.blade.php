@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('Indeks Tahunan') }}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pengguna</h6>
                                <h6 class="font-extrabold mb-0">{{ $users }} Orang</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="fas fa-map"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Luas Lahan</h6>
                                <h6 class="font-extrabold mb-0">{{ $garden->sum('luas') }} Hektar</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="fas fa-baby-carriage"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah & Stok Pupuk</h6>
                                <h6 class="font-extrabold mb-0">{{ $pupuks }} / {{ $stoks }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pemupukan</h6>
                                <h6 class="font-extrabold mb-0">{{ number_format($percentage, 2) }}%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ __('Tahun :') }} {{ \Carbon\Carbon::now()->year }}</h4>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-12">
                <div id="QuantityPupuk"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="container"></div>
            </div>
            <div class="d-flex justify-content-around mt-3">
                <h5>Luas : <strong>{{ $garden->sum('luas') }}</strong> (Hektar)</h5>
                <h5>Total : <strong>{{ $garden->count() }} Lahan</strong></h5>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- Grafik Untuk Pemupukan Lahan --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var gardenData = {!! json_encode($gardenData) !!};
    var colors = ['#7cb5ec', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1', '#434348'];

    // Assign colors to each data point
    for (var i = 0; i < gardenData.length; i++) {
        gardenData[i].color = colors[i % colors.length];
    }

    Highcharts.chart('container', {
        chart: { type: 'pie' },
        title: { text: 'Persentase Pemupukan Lahan' },
        tooltip: { valueSuffix: '%' },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: [{
                    enabled: true,
                    distance: 20
                }, {
                    enabled: true,
                    distance: -40,
                    format: '{point.percentage:.2f}%',
                    style: {
                        fontSize: '1.2em',
                        textOutline: 'none',
                        opacity: 0.7
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        series: [{
            name: 'Sudah dipupuk',
            colorByPoint: true,
            data: gardenData
        }]
    });
});
</script>