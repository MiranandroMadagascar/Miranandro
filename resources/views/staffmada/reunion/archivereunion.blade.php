@extends('layout.admin')
@section('title', 'Rapport de la Réunion')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="meeting-card">
                <div class="meeting-title">{{ $rapport->titre_activite }}</div> <!-- Titre de l'activité -->
                <div class="meeting-info">
                    <h5>Date</h5>
                    <p>{{ $rapport->date_activite }}</p> <!-- Date de l'activité -->
                </div>
                <div class="meeting-info">
                    <h5>Ordre du Jour</h5>
                    <p>{{ $rapport->ordre_du_jour }}</p> <!-- Ordre du jour -->
                </div>
                <div class="meeting-info">
                    <h5>Procès Verbal</h5>
                    <p>{{ $rapport->proces_verbal }}</p> <!-- Procès verbal -->
                </div>
                <div class="meeting-info">
                    <h5>Rapport</h5>
                    <p>{{ $rapport->rapport }}</p> <!-- Rapport -->
                </div>
            </div>

            <!-- Bouton pour exporter en PDF -->
            <div class="text-center mt-4">
                <a href="{{ route('rapports.export.pdf', $rapport->id_activite) }}" class="btn btn-warning">Exporter en PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
