@extends('layout.admin')
@section('title', 'Facture')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" />
                            <div class="invoice-info">
                                <h2>Facture</h2>
                                <p>Numéro de Facture : <span id="invoice-number">{{ $facture[0]->numero }}</span></p>
                            </div>
                        </div>
                        <div class="invoice-details row">
                            <div class="col-md-6">
                                <h5>Responsable</h5>
                                <p id="responsable">{{ $facture[0]->nom_responsable }} {{ $facture[0]->prenoms_responsable }}</p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <h5>Date de la Facture</h5>
                                <p id="invoice-date">{{ $facture[0]->date_facture }}</p>
                            </div>
                        </div>
                        <div class="invoice-details row">
                            <div class="col-md-6">
                                <h5>Client</h5>
                                <p id="client-name">{{ $facture[0]->nom_client }}</p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <h5>Montant Total</h5>
                                <p id="total-amount">{{ number_format($facture[0]->montant_total_facture, 2, '.', ',') }}</p>
                            </div>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Montant Total de l'Article</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facture as $item)
                                        <tr>
                                            <td>{{ $item->designation }}</td>
                                            <td>{{ $item->quantite }}</td>
                                            <td>{{ $item->prix_unitaire }} €</td>
                                            <td>{{ $item->montant_total }} €</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right invoice-total">
                            Total: {{ $facture[0]->montant_total_facture }} AR
                        </div>
                        <div class="text-center mt-4">
                            <label for="amount-in-words">Arreté à la somme de:</label>
                            <p id="amount-in-words" class="invoice-total"></p>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('facture.export', ['factureId' => $facture[0]->id_facture]) }}" class="btn btn-warning">Exporter en PDF</a>
                        </div>
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
