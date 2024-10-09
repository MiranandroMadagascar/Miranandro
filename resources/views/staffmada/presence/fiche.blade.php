@extends('layout.admin')
@section('title', 'Fiche de présence')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fiche de présence pour l'activité : {{ $activite->titre_activite }}</h4>
                    <p class="card-description">
                        Section Responsable : {{ $activite->section_responsable }}
                    </p>

                    <!-- Tableau des présences -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($presences as $presence)
                                <tr>
                                    <td>{{ $presence->nom }}</td>
                                    <td>{{ $presence->prenoms }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Aucun participant trouvé pour cette activité</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <!-- Bouton retour -->
                    <a href="{{ route('presence.suivi') }}" class="btn btn-secondary mt-3">Retour aux activités</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
