@extends('layout.admin')
@section('title', 'Calendrier')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tableau Annuel des Activités</h4>

                    <!-- Formulaire de filtrage par année -->
                    <form action="{{ route('activite.calendrier') }}" method="GET" class="mb-3">
                        <div class="form-group row">
                            <div class="col-md-4"> <!-- Réduit la largeur de l'input -->
                                <select name="year" id="year" class="form-control">
                                    <option value="">Tous les ans</option>
                                    @for ($i = 2022; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}" {{ (isset($year) && $year == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filtrer</button>
                            </div>
                        </div>
                    </form>

                    <div class="calendar">
                        @foreach($activitesParMois as $mois => $activites)
                            <div class="month">
                                <h4>{{ $mois }}</h4>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Section Responsable</th>
                                                <th>Date - Heure</th>
                                                <th>Fiche</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($activites as $activite)
                                                <tr class="table-info">
                                                    <td>{{ $activite->titre_activite }}</td>
                                                    <td>{{ $activite->nom_section }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($activite->date_activite)->format('d/m/Y') }} : {{ $activite->heure_debut }} - {{ $activite->heure_fin }}</td>
                                                    <td>
                                                        <a href="{{ route('activite.calendrier.details', ['id_activite' => $activite->id_activite]) }}" class="btn btn-info btn-sm">
                                                            <i class="ti-info-alt"></i>
                                                            Fiche
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">Aucune activité validée trouvée pour ce mois.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
