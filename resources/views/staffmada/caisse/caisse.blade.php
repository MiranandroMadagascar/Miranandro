@extends('layout.admin')
@section('title', 'Caisse')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Caisse</h4>
                    <p class="card-description">
                        Entrée en caisse
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

                    <form action="{{ route('caisse.inserer') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type_don">Catégorie de Caisse</label>
                            <select name="id_categorie_caisse" class="form-control" id="type_don" required>
                                <option disabled selected>Choisissez une catégorie</option>
                                @foreach($categoriesCaisse as $categorie)
                                    <option value="{{ $categorie->id_categorie_caisse }}">{{ $categorie->nom_categorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="montant" class="col-sm-3 col-form-label">Montant</label>
                            <div class="col-sm-9">
                                <input type="number" name="montant" class="form-control" id="montant" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_entree" class="col-sm-3 col-form-label">Date d'entrée en caisse</label>
                            <div class="col-sm-9">
                                <input type="date" name="date_entree" class="form-control" id="date_entree" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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
        }, 5000);
    });
</script>
@endpush
