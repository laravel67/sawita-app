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
                                <h6 class="font-extrabold mb-0">{{ $stok->count() }} / {{ $stok->sum('total') }}
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
        </div>
    </div>
</div>
@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
            subtitle: { text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>' },
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
                        format: '{point.percentage:.1f}%',
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('QuantityPupuk', {
            chart: { type: 'column' },
            title: { text: 'Corn vs wheat estimated production for 2020', align: 'left' },
            subtitle: { text: 'Source: <a target="_blank" href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>', align: 'left' },
            xAxis: { categories: ['USA', 'China', 'Brazil', 'EU', 'India', 'Russia'], crosshair: true, accessibility: { description: 'Countries' } },
            yAxis: { min: 0, title: { text: '1000 metric tons (MT)' } },
            tooltip: { valueSuffix: ' (1000 MT)' },
            plotOptions: { column: { pointPadding: 0.2, borderWidth: 0 } },
            series: [{
                name: 'Corn',
                data: [406292, 260000, 107000, 68300, 27500, 14500]
            }, {
                name: 'Wheat',
                data: [51086, 136000, 5500, 141000, 107180, 77000]
            }]
        });
    });
</script>