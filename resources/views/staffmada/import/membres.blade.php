@extends('layout.admin')

@section('title', 'Import des Membres')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Importation des Membres</h1>

    <!-- Formulaire combiné pour importer les membres adhérents et bénéficiaires -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h2 class="text-center mb-4">Importer les Membres Adhérents & Bénéficiaires</h2>
                <form action="{{ route('import.membres') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input pour le fichier des adhérents -->
                    <div class="form-group mb-3">
                        <label for="file_adherents" class="form-label"><strong>Fichier CSV des Adhérents</strong></label>
                        <input type="file" name="file_adherents" id="file_adherents" class="form-control" required>
                    </div>

                    <!-- Input pour le fichier des bénéficiaires -->
                    <div class="form-group mb-3">
                        <label for="file_beneficiaires" class="form-label"><strong>Fichier CSV des Bénéficiaires</strong></label>
                        <input type="file" name="file_beneficiaires" id="file_beneficiaires" class="form-control" required>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Importer les Membres</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Vous pouvez ajouter des scripts supplémentaires ici si nécessaire -->
@endpush
