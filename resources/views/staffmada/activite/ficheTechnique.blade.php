@extends('layout.admin')
@section('title', 'Fiche Technique')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fiche Technique</h4>
                    <p class="card-description">
                        Détails de l'activité
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

                    <!-- Formulaire de fiche technique -->
                    <form class="forms-sample" method="POST" action="{{ route('fiche_technique.inserer', ['id_activite' => $id_activite]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="objectif" class="col-sm-3 col-form-label">Objectifs</label>
                            <div class="col-sm-9">
                                <textarea name="objectif" class="form-control" id="objectif" placeholder="Objectifs" required>{{ old('objectif') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="methodologie" class="col-sm-3 col-form-label">Méthodologie</label>
                            <div class="col-sm-9">
                                <textarea name="methodologie" class="form-control" id="methodologie" placeholder="Méthodologie" required>{{ old('methodologie') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="participants" class="col-sm-3 col-form-label">Participants</label>
                            <div class="col-sm-9">
                                <textarea name="participants" class="form-control" id="participants" placeholder="Participants" required>{{ old('participants') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="justifications" class="col-sm-3 col-form-label">Justifications</label>
                            <div class="col-sm-9">
                                <textarea name="justifications" class="form-control" id="justifications" placeholder="Justifications">{{ old('justifications') }}</textarea>
                            </div>
                        </div>

                        <!-- Boutons Valider et Ajouter Dépenses -->
                        <button type="submit" name="ajouter_depenses" class="btn btn-info">Ajouter Dépenses</button>
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
        }, 3000);
    });
</script>
@endpush
