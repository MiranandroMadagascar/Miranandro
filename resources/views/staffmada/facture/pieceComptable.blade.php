@extends('layout.admin')
@section('title', 'Pièces Comptables')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listes des Activités avec Pièces Comptables</h4>
                <p class="card-description">
                    <code>Activités avec leurs factures associées</code>
                </p>
                <div class="table-responsive">
                    @if($activitesAvecFactures->isEmpty())
                        <p class="text-center">Aucune activité avec pièces comptables à afficher.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Titre de l'Activité</th>
                                    <th>Date de l'Activité</th>
                                    <th>Heure</th>
                                    <th>Lieu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activitesAvecFactures as $activite)
                                <tr>
                                    <td>{{ $activite->titre_activite }}</td>
                                    <td>{{ \Carbon\Carbon::parse($activite->date_activite)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($activite->heure_debut)->format('H:i') }} - {{ \Carbon\Carbon::parse($activite->heure_fin)->format('H:i') }}</td>
                                    <td>{{ $activite->lieu_activite }}</td>
                                    <td>
                                        <a href="{{ route('factures.activite', $activite->id_activite) }}" class="btn btn-primary btn-sm">Voir toutes les factures</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        @if($activitesAvecFactures->hasPages())
                        <div class="pagination mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $activitesAvecFactures->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $activitesAvecFactures->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    @for ($i = 1; $i <= $activitesAvecFactures->lastPage(); $i++)
                                        <li class="page-item {{ $i == $activitesAvecFactures->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $activitesAvecFactures->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $activitesAvecFactures->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $activitesAvecFactures->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Scripts supplémentaires si nécessaire -->
@endpush
