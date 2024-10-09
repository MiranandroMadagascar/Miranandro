@extends('layout.director')
@section('title', 'Dépenses Mensuelles')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dépenses Mensuelles</h4>

                    <!-- Filtre par année -->
                    <form action="{{ route('depenses.director.mensuelles') }}" method="GET" class="form-inline mb-3">
                        <label for="annee" class="mr-2">Filtrer par année :</label>
                        <select name="annee" id="annee" class="form-control mr-2">
                            @for($i = date('Y'); $i >= 2022; $i--)
                                <option value="{{ $i }}" {{ $i == $annee ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>

                    <!-- Graphique en barres des dépenses mensuelles -->
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="js/chart.js"></script>
<script>
    // Récupérer les labels (mois) et les données des dépenses via Blade
    var labels = @json($labels);
    var dataDepenses = @json($data);

    // Configuration du graphique en barres
    var barChartCanvas = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: {
            labels: labels, // Mois en lettres
            datasets: [{
                label: 'Dépenses (ARIARY)',
                data: dataDepenses, // Dépenses par mois
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
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
                        text: 'Dépenses (ARIARY)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
