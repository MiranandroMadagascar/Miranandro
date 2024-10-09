@extends('layout.admin')
@section('title', 'Historique Mouvement Caisse')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <h3 class="font-weight-bold">Historique des mouvements de caisse</h3>
            
            <!-- Filtre par année -->
            <form action="{{ route('dashbord.historiqueCaisse') }}" method="GET" class="form-inline mb-3">
                <label for="annee" class="mr-2">Filtrer par année :</label>
                <select name="annee" id="annee" class="form-control mr-2">
                    @for($i = date('Y'); $i >= 2022; $i--)
                        <option value="{{ $i }}" {{ $i == $annee ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </form>

            <!-- Cumul du budget précédent -->
            <table class="table table-bordered">
                <thead class="bg-warning">
                    <tr>
                        <th colspan="6" class="text-center">CUMUL {{ $annee - 1 }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">RESTE CAISSE</td>
                        <td>{{ number_format($solde_precedent, 2, '.', ' ') }} ARIARY</td>
                        <td></td>
                        <td>{{ number_format($solde_precedent, 2, '.', ' ') }} ARIARY</td>
                        <td>Solde cumulé {{ $annee - 1 }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Mouvements de l'année courante -->
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th colspan="6" class="text-center">MOUVEMENT DU COMPTE {{ $annee }}</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Objet</th>
                        <th>Entrée (ARIARY)</th>
                        <th>Sortie (ARIARY)</th>
                        <th>Cumul Budget (ARIARY)</th>
                        <th>Observation</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cumul_budget = $solde_precedent; // Initialiser avec le solde de l'année précédente
                        $mois_actuel = null;
                    @endphp
                    @foreach($mouvements as $mouvement)
                        @php
                            $mois_mouvement = \Carbon\Carbon::parse($mouvement->date_mouvement)->format('F Y');
                        @endphp
                        
                        <!-- Afficher le nom du mois s'il change -->
                        @if($mois_actuel != $mois_mouvement)
                            <tr class="bg-info text-white">
                                <td colspan="6" class="text-center">{{ strtoupper($mois_mouvement) }}</td>
                            </tr>
                            @php
                                $mois_actuel = $mois_mouvement;
                            @endphp
                        @endif

                        <tr>
                            <td>{{ \Carbon\Carbon::parse($mouvement->date_mouvement)->format('d/m/Y') }}</td>
                            <td>{{ $mouvement->depense_description ?? $mouvement->categorie_caisse }}</td>
                            <td>{{ $mouvement->type_mouvement == 'entree' ? number_format($mouvement->montant, 2, '.', ' ') : '' }}</td>
                            <td>{{ $mouvement->type_mouvement == 'sortie' ? number_format($mouvement->montant, 2, '.', ' ') : '' }}</td>
                            
                            <!-- Calcul du cumul -->
                            @php
                                if ($mouvement->type_mouvement == 'entree') {
                                    $cumul_budget += $mouvement->montant;
                                } else {
                                    $cumul_budget -= $mouvement->montant;
                                }
                            @endphp
                            
                            <td>{{ number_format($cumul_budget, 2, '.', ' ') }} ARIARY</td>
                            <td>{{ $mouvement->depense_description ?? 'Pour ' . $mouvement->categorie_caisse }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Totaux de l'année sélectionnée -->
            <table class="table table-bordered">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th colspan="2">Total des entrées</th>
                        <th colspan="2">Total des sorties</th>
                        <th>Solde annuel</th>
                        <th>Solde cumulé {{ $annee }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">{{ number_format($soldes->total_entrees, 2, '.', ' ') }} ARIARY</td>
                        <td colspan="2">{{ number_format($soldes->total_sorties, 2, '.', ' ') }} ARIARY</td>
                        <td>{{ number_format($soldes->solde_annuel, 2, '.', ' ') }} ARIARY</td>
                        <td>{{ number_format($soldes->solde_cumule, 2, '.', ' ') }} ARIARY</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
