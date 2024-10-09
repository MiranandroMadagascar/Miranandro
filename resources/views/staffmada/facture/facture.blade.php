@extends('layout.admin')
@section('title', 'Création de Facture')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-container">
                        <div class="invoice-header text-center">
                            <h2>Créer une Facture</h2>
                            <h3>Activité : {{ $activite->titre }}</h3>
                            <p>Numéro de Facture : <span id="invoice-number">{{ $numeroFacture ?? 'FACT00001' }}</span></p>
                        </div>

                        <form class="forms-sample" id="facture-container" method="POST" action="{{ route('facture.store') }}">
                            @csrf
                            <div class="invoice-details row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="responsable">Responsable</label>
                                        <select name="responsable" class="form-control" required>
                                            @foreach($responsables as $responsable)
                                                <option value="{{ $responsable->id_membre_adherent }}">{{ $responsable->prenoms }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_activite" value="{{ $activite->id_activite }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_facture">Date de la Facture</label>
                                        <input type="date" name="date_facture" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-details row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom_client">Nom du Client</label>
                                        <input type="text" name="nom_client" class="form-control" placeholder="Nom du Client" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="montant_total">Montant Total de la Facture</label>
                                        <input type="number" name="montant_total" class="form-control" id="montant_total" placeholder="Montant Total" readonly required>
                                    </div>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detailsContainer">
                                        <tr>
                                            <td><input type="text" name="designation[]" class="form-control" placeholder="Désignation" required></td>
                                            <td><input type="number" name="quantite[]" class="form-control quantity" placeholder="Quantité" oninput="calculateRowTotal(this)" required></td>
                                            <td><input type="number" name="prix_unitaire[]" class="form-control unit-price" placeholder="Prix Unitaire" oninput="calculateRowTotal(this)" required></td>
                                            <td><input type="number" name="montant_total_article[]" class="form-control row-total" placeholder="Montant Total de l'Article" readonly></td>
                                            <td><button type="button" class="btn btn-danger btn-remove-detail" onclick="removeItem(this)">Supprimer</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" id="addDetailButton">Ajouter un Article</button>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Valider la Facture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function calculateRowTotal(element) {
        var row = element.closest('tr');
        var quantity = row.querySelector('.quantity').value;
        var unitPrice = row.querySelector('.unit-price').value;
        var rowTotal = row.querySelector('.row-total');

        if (quantity && unitPrice) {
            rowTotal.value = (quantity * unitPrice).toFixed(2);
        }
        
        calculateInvoiceTotal();
    }

    function calculateInvoiceTotal() {
        var totalAmount = 0;
        document.querySelectorAll('.row-total').forEach(function(rowTotal) {
            totalAmount += parseFloat(rowTotal.value || 0);
        });

        document.getElementById('montant_total').value = totalAmount.toFixed(2);
    }

    function addItem() {
        var container = document.getElementById('detailsContainer');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" name="designation[]" class="form-control" placeholder="Désignation" required></td>
            <td><input type="number" name="quantite[]" class="form-control quantity" placeholder="Quantité" oninput="calculateRowTotal(this)" required></td>
            <td><input type="number" name="prix_unitaire[]" class="form-control unit-price" placeholder="Prix Unitaire" oninput="calculateRowTotal(this)" required></td>
            <td><input type="number" name="montant_total_article[]" class="form-control row-total" placeholder="Montant Total de l'Article" readonly></td>
            <td><button type="button" class="btn btn-danger btn-remove-detail" onclick="removeItem(this)">Supprimer</button></td>
        `;
        container.appendChild(newRow);
    }

    function removeItem(button) {
        var row = button.closest('tr');
        row.remove();
        calculateInvoiceTotal();
    }

    document.getElementById('addDetailButton').addEventListener('click', addItem);

    document.getElementById('facture-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-remove-detail')) {
            e.target.closest('tr').remove();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successAlerts = document.querySelectorAll('.alert-success');
            var errorAlerts = document.querySelectorAll('.alert-danger');
            
            successAlerts.forEach(function(alert) {
                alert.style.display = 'none';
            });

            errorAlerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000);
    });
</script>
@endpush
