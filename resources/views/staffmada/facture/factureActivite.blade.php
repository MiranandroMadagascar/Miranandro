@extends('layout.admin')
@section('title', 'Factures pour l\'activité')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Factures de l'Activité: {{ $activite->titre }}</h4>
                    <p class="card-description">Liste des factures associées à cette activité</p>

                    <!-- Boucle pour chaque facture -->
                    <div class="row">
                        @foreach($factures as $facture)
                            <div class="col-md-6 mb-4"> <!-- Deux factures par ligne -->
                                <div class="invoice-container border rounded shadow-sm p-3">
                                    <div class="invoice-header d-flex justify-content-between">
                                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-small" />
                                        <div class="invoice-info text-right">
                                            <h2>Facture</h2>
                                            <p>Numéro de Facture : <strong>{{ $facture->numero_facture }}</strong></p>
                                        </div>
                                    </div>

                                    <!-- Détails de la facture -->
                                    <div class="invoice-details mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Responsable</h5>
                                                <p>{{ $facture->nom_responsable }} {{ $facture->prenoms_responsable }}</p>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <h5>Date de la Facture</h5>
                                                <p>{{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Client</h5>
                                                <p>{{ $facture->nom_client }}</p>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <h5>Montant Total</h5>
                                                <p>{{ number_format($facture->montant_facture, 2, '.', ',') }} AR</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table des détails de la facture -->
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Désignation</th>
                                                    <th>Quantité</th>
                                                    <th>Prix Unitaire</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($facture->details as $detail)
                                                    <tr>
                                                        <td>{{ $detail->designation }}</td>
                                                        <td>{{ $detail->quantite }}</td>
                                                        <td>{{ number_format($detail->prix_unitaire, 2, '.', ',') }} AR</td>
                                                        <td>{{ number_format($detail->montant_total, 2, '.', ',') }} AR</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Total de la facture -->
                                    <div class="text-right invoice-total">
                                        <strong>Total:</strong> {{ number_format($facture->montant_facture, 2, '.', ',') }} AR
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $factures->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $factures->previousPageUrl() }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $factures->lastPage(); $i++)
                                    <li class="page-item {{ $i == $factures->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $factures->url($i) }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $factures->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $factures->nextPageUrl() }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}">&raquo;</a>
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
<script src="{{ asset('js/facture.js') }}"></script>
@endpush
