@extends('layout.admin')
@section('title', 'Dépenses réelles')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dépenses</h4>

                    <h4 class="text-center">Ajouter Dépense Réelle pour {{ $activite->titre }}</h4>

                    <p class="card-description">
                        Dépenses faites / Activité
                    </p>
                    
                    <!-- Affichage des messages de succès -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Affichage des erreurs de validation -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('depense.store', ['id_activite' => $activite->id_activite]) }}" method="POST">
                        @csrf
                        <div id="expenseContainer">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="designation">Désignation</label>
                                    <input type="text" name="designation[]" class="form-control" placeholder="Désignation" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="type_depense">Type de dépense</label>
                                    <select name="type_depense[]" class="form-control">
                                        @foreach($typesDepenses as $typeDepense)
                                            <option value="{{ $typeDepense->id_type_depense }}">{{ $typeDepense->nom_depense }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="quantite">Quantité</label>
                                    <input type="number" name="quantite[]" class="form-control" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="prix_unitaire">Prix Unitaire (Ariary)</label>
                                    <input type="number" name="prix_unitaire[]" class="form-control" required>
                                </div>
                                <button type="button" class="btn btn-danger btn-remove-depense">Supprimer</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info" id="addExpenseButton">Ajouter Autres Dépenses</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('addExpenseButton').addEventListener('click', function() {
        var container = document.getElementById('expenseContainer');
        var newRow = document.createElement('div');
        newRow.className = 'form-row';
        newRow.innerHTML = `
            <div class="form-group col-md-4">
              <label for="designation">Désignation</label>
              <input type="text" name="designation[]" class="form-control" placeholder="Désignation">
            </div>
            <div class="form-group col-md-2">
              <label for="type_depense">Type de dépense</label>
              <select name="type_depense[]" class="form-control">
                @foreach($typesDepenses as $typeDepense)
                    <option value="{{ $typeDepense->id_type_depense }}">{{ $typeDepense->nom_depense }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="quantite">Quantité</label>
              <input type="number" name="quantite[]" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="prix_unitaire">Prix Unitaire (Ariary)</label>
              <input type="number" name="prix_unitaire[]" class="form-control">
            </div>
            <button type="button" class="btn btn-danger btn-remove-depense">Supprimer</button>
        `;
        container.appendChild(newRow);
    });

    // Event delegation pour le bouton de suppression
    document.getElementById('depense-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-remove-depense')) {
            e.target.closest('.form-row').remove();
        }
    });
</script>
<script>
    // Fonction pour masquer les messages après 5 secondes (5000 millisecondes)
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
        }, 3000);
    });
</script>
@endpush
