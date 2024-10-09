@extends('layout.director')
@section('title', 'Dépenses par activité')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Total des dépenses</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Détail des Dépenses</h4>
                    <p class="card-description">
                        <code>{{ $details[0]->titre_activite }}</code>
                    </p>
                    <h6 class="font-weight-normal mb-0">
                        <p><span class="text-primary">Depense Previsionnelle : {{ number_format($depense->total_budget_previsionnel, 2, ',', ' ') }} ARIARY</span></p>
                        <p><span class="text-primary">Depense Réelle : {{ number_format($depense->total_depenses_reelles, 2, ',', ' ') }} ARIARY</span></p>
                    </h6>
                    <div class="table-responsive pt-3">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <!-- Colonnes pour les dépenses réelles -->
                                    <th colspan="4" class="text-center">Réelles</th>
                                    <!-- Colonnes pour les dépenses prévisionnelles -->
                                    <th colspan="4" class="text-center">Prévisionnelles</th>
                                </tr>
                                <tr>
                                    <!-- Détails des dépenses réelles -->
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Montant Total</th>
                                    <!-- Détails des dépenses prévisionnelles -->
                                    <th>Désignation</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Montant Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Récupérer les dépenses prévisionnelles et réelles
                                    $depensesPrevisionnelles = $details->where('type_depense', 'previsionnel')->values();
                                    $depensesReelles = $details->where('type_depense', 'reel')->values();
                                    // Déterminer le nombre maximum de lignes
                                    $maxRows = max($depensesPrevisionnelles->count(), $depensesReelles->count());
                                @endphp

                                @for ($i = 0; $i < $maxRows; $i++)
                                    <tr>
                                        <!-- Colonne des dépenses réelles -->
                                        <td>{{ $depensesReelles[$i]->designation ?? '' }}</td>
                                        <td>{{ $depensesReelles[$i]->quantite ?? '' }}</td>
                                        <td>{{ isset($depensesReelles[$i]) ? number_format($depensesReelles[$i]->prix_unitaire, 2, ',', ' ') . ' ARIARY' : '' }}</td>
                                        <td>{{ isset($depensesReelles[$i]) ? number_format($depensesReelles[$i]->montant, 2, ',', ' ') . ' ARIARY' : '' }}</td>

                                        <!-- Colonne des dépenses prévisionnelles -->
                                        <td>{{ $depensesPrevisionnelles[$i]->designation ?? '' }}</td>
                                        <td>{{ $depensesPrevisionnelles[$i]->quantite ?? '' }}</td>
                                        <td>{{ isset($depensesPrevisionnelles[$i]) ? number_format($depensesPrevisionnelles[$i]->prix_unitaire, 2, ',', ' ') . ' ARIARY' : '' }}</td>
                                        <td>{{ isset($depensesPrevisionnelles[$i]) ? number_format($depensesPrevisionnelles[$i]->montant, 2, ',', ' ') . ' ARIARY' : '' }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
