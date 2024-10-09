@extends('layout.director')
@section('title', 'Dépenses par catégorie')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dépenses par Catégorie</h4>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var doughnutPieData = {
        datasets: [{
            data: @json($montants), // Dynamiser les montants des dépenses
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
        }],
        // Dynamiser les labels (catégories de dépenses)
        labels: @json($categories)
    };

    var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: doughnutPieData,
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
</script>
@endpush
