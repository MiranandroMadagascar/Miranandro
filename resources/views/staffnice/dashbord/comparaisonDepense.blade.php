@extends('layout.director')
@section('title', 'Comparaison des Dépenses')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dépenses Faites par Activités</h4>
                    <p class="card-description">Table des dépenses par activités</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Date</th>
                                    <th>Lieu</th>
                                    <th>Dépenses Prévisionnelles</th>
                                    <th>Dépenses Réelles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($depenses as $depense)
                                <tr>
                                    <td>{{ $depense->titre_activite }}</td>
                                    <td>{{ $depense->date_activite }}</td>
                                    <td>{{ $depense->lieu_activite }}</td>
                                    <td>{{ number_format($depense->total_budget_previsionnel, 2, '.', ',') }} AR</td>
                                    <td>{{ number_format($depense->total_depenses_reelles, 2, '.', ',') }} AR</td>
                                    <td>
                                        <a href="{{ route('depenses.director.details', $depense->id_activite) }}" class="btn btn-dark btn-icon-text btn-sm">
                                            <i class="ti-info-alt btn-icon-prepend"></i> Détail dépenses
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucune dépense trouvée</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $depenses->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $depenses->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $depenses->lastPage(); $i++)
                                    <li class="page-item {{ $i == $depenses->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $depenses->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $depenses->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $depenses->nextPageUrl() }}">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
