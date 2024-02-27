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
                    <div class="card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Lahan</th>
                                    <th scope="col">Jenis Tanah</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($analisis as $analize)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <th>{{ $analize->garden->name }}</th>
                                    <td>{{ $analize->jenis }}</td>
                                    <td>
                                        <form id="delete-form" action="{{ route('analisi.destroy', $analize->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
    var analizes = @json($analisis);
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
    }]
    });
    });
</script>
@endpush