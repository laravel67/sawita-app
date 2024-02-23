@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="container"></div>
                    </div>
                    <ul>
                        @foreach ($analizes as $analize )
                        <li>
                            <h3>{{ $analize->garden->name }}</h3>
                        </li>
                        <li>
                            {!! $analize->notes !!}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var analizes = @json($analizes);
    var categories = analizes.map(function(analize) {
    // Check if the garden object exists before accessing its name property
    return analize.garden ? analize.garden.name : 'Unknown'; // Assuming 'Unknown' as default value if garden is not defined
    });
    var keasaman_data = analizes.map(function(analize) {
    return analize.keasaman;
    });
    var kelembaban_data = analizes.map(function(analize) {
    return analize.kelembaban;
    });
    var pupuk_dibutuhkan_data = analizes.map(function(analize) {
    return analize.pupuk_dibutuhkan;
    });
    
    Highcharts.chart('container', {
    chart: {
    type: 'column'
    },
    title: {
    text: 'Hasil Analisis Lahan: Perkebunan Sawit: Sawita Raya'
    },
    xAxis: {
    categories: categories
    },
    backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
    borderColor: '#CCC',
    borderWidth: 1,
    shadow: false,
    tooltip: {
    headerFormat: '<b>{point.x}</b><br />',
    pointFormat: '{series.name}: {point.y}<br />',
    shared: true
    },
    plotOptions: {
    column: {
    stacking: 'normal'
    }
    },
    series: [{
    name: 'Keasaman (pH)',
    data: keasaman_data
    }, {
    name: 'Kelembaban (%)',
    data: kelembaban_data
    }, {
    name: 'Pupuk dibutuhkan',
    data: pupuk_dibutuhkan_data
    }]
    });
    });
</script>
@endpush