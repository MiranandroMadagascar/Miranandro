@extends('layout.admin')
@section('title', 'Logistique')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Logistique</h4>
                    <p class="card-description">
                        Nouvelle Logistique
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="forms-sample" method="POST" action="{{ route('logistique.inserer') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nom_article" class="col-sm-3 col-form-label">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" name="nom_article" class="form-control" id="nom_article" placeholder="Nom de l'article" value="{{ old('nom_article') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie" class="form-control" id="categorie">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id_categorie_logistique }}" {{ old('categorie') == $categorie->id_categorie_logistique ? 'selected' : '' }}>
                                        {{ $categorie->nom_categorie }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{ old('description') }}">
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
