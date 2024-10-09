@extends('layout.admin')
@section('title', 'Mouvement Logistique')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Logistique</h4>
                    <p class="card-description">
                        Mouvement de Logistique
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form class="forms-sample" method="POST" action="{{ route('mouvement.inserer') }}">
                        @csrf
                        <div class="form-group">
                            <label for="mouvement">Mouvement</label>
                            <select name="id_type_mouvement" class="form-control" id="mouvement">
                                @foreach ($typesMouvement as $type)
                                    <option value="{{ $type->id_type_mouvement }}">{{ $type->nom_type_mouvement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="logistique">Logistique</label>
                            <select name="id_logistique" class="form-control" id="logistique">
                                @foreach ($logistiques as $logistique)
                                    <option value="{{ $logistique->id_logistique }}">{{ $logistique->nom_article }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="date_mouvement" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date_mouvement" class="form-control" id="date_mouvement" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantite" class="col-sm-3 col-form-label">Quantité</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantite" class="form-control" id="quantite" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control" id="description" placeholder="description" required>
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
