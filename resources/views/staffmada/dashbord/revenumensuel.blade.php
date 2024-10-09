@extends('layout.admin')
@section('title', 'Revenus Mensuels')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Revenus Mensuels</h4>

                    <!-- Filtre par année -->
                    <form action="{{ route('dashbord.revenusMensuels') }}" method="GET" class="form-inline mb-3">
                        <label for="annee" class="mr-2">Filtrer par année :</label>
                        <select name="annee" id="annee" class="form-control mr-2">
                            @for($i = date('Y'); $i >= 2022; $i--)
                                <option value="{{ $i }}" {{ $i == $annee ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>

                    <canvas id="areaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var labels = @json($labels);  // Mois en lettres
    var dataRevenus = @json($data);

    var areaData = {
        labels: labels,
        datasets: [{
            label: 'Revenus (ARIARY)',
            data: dataRevenus,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: true
        }]
    };

    var areaChartCanvas = document.getElementById('areaChart').getContext('2d');
    var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaData,
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Revenus (ARIARY)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
