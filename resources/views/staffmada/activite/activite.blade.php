@extends('layout.admin')
@section('title', 'Activité')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nouvelle Activité</h4>
                    <p class="card-description">Planification d'activité</p>

                    <!-- Affichage du message de succès -->
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

                    <!-- Formulaire de création d'activité -->
                    <form class="forms-sample" method="POST" action="{{ route('activite.inserer') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="titre" class="col-sm-3 col-form-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="{{ old('titre') }}" required>
                            </div>
                        </div>

                        <!-- Dynamisation du type d'activité -->
                        <div class="form-group">
                            <label for="type_activite">Type d'activité</label>
                            <select name="id_type_activite" class="form-control" id="type_activite" required>
                                @foreach ($typesActivites as $type)
                                    <option value="{{ $type->id_type_activite }}" {{ old('id_type_activite') == $type->id_type_activite ? 'selected' : '' }}>
                                        {{ $type->nom_activite }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="date_activite" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date_activite" class="form-control" id="date_activite" value="{{ old('date_activite') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="heure_debut" class="col-sm-3 col-form-label">De</label>
                            <div class="col-sm-9">
                                <input type="time" name="heure_debut" class="form-control" id="heure_debut" value="{{ old('heure_debut') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="heure_fin" class="col-sm-3 col-form-label">À</label>
                            <div class="col-sm-9">
                                <input type="time" name="heure_fin" class="form-control" id="heure_fin" value="{{ old('heure_fin') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lieu" class="col-sm-3 col-form-label">Lieu</label>
                            <div class="col-sm-9">
                                <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Lieu" value="{{ old('lieu') }}" required>
                            </div>
                        </div>

                        <!-- Boutons Valider et Ajouter Fiche Technique -->
                        <button type="submit" name="valider" class="btn btn-primary mr-2">Valider</button>
                        <button type="submit" name="ajouter_fiche_technique" class="btn btn-info">Ajouter Fiche Technique</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
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
