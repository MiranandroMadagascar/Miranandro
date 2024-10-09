@extends('layout.admin')
@section('title', 'Rapports réunions')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rapport de la Réunion : {{ $reunion->titre_activite }}</h4>
                    <form class="forms-sample" method="POST" action="{{ route('reunion.soumettreRapport', ['id_activite' => $reunion->id_activite]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="ordre" class="col-sm-3 col-form-label">Ordre du jour</label>
                            <div class="col-sm-9">
                                <textarea name="ordre_du_jour" class="form-control" id="ordre" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proces" class="col-sm-3 col-form-label">Procès Verbal</label>
                            <div class="col-sm-9">
                                <textarea name="proces_verbal" class="form-control" id="proces" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rapport" class="col-sm-3 col-form-label">Rapport</label>
                            <div class="col-sm-9">
                                <textarea name="rapport" class="form-control" id="rapport" required></textarea>
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
@endpush
