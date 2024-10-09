@extends('layout.admin')
@section('title', 'Activités Proches')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listes des Activités</h4>
                <p class="card-description">
                    <code>Proches</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Type d'activité</th>
                                <th>Section Responsable</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Lieu</th>
                                <th>Budget Prévisionnel</th>
                                <th>Ajouter Pièce Jointe</th>
                                <th>Ajouter Dépense Réelle</th> <!-- Ajout d'une nouvelle colonne pour les dépenses réelles -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activites as $activite)
                            <tr>
                                <td>{{ $activite->titre_activite }}</td>
                                <td>{{ $activite->type_activite }}</td>
                                <td>{{ $activite->nom_section  }}</td>
                                <td>{{ \Carbon\Carbon::parse($activite->date_activite)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($activite->heure_debut)->format('H:i') }} - {{ \Carbon\Carbon::parse($activite->heure_fin)->format('H:i') }}</td>
                                <td>{{ $activite->lieu_activite }}</td>
                                <td>{{ number_format($activite->budget_previsionnel_total, 2) }} AR</td>
                                <td>
                                    <a href="{{ route('facture.create', ['id_activite' => $activite->id_activite]) }}" class="btn btn-success btn-sm">+ Pièce Comptable</a>
                                </td>
                                <td>
                                    <a href="{{ route('depense.create', ['id_activite' => $activite->id_activite]) }}" class="btn btn-warning btn-sm">+ Dépense Réelle</a> <!-- Ajout du bouton pour ajouter une dépense réelle -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucune activité proche trouvée.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    @if($activites->hasPages())
                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $activites->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $activites->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $activites->lastPage(); $i++)
                                    <li class="page-item {{ $i == $activites->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $activites->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $activites->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $activites->nextPageUrl() }}">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
