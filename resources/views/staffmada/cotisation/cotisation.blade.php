@extends('layout.admin')
@section('title', 'Cotisation')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listes des Cotisations</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Type de Cotisation</th>
                                    <th>Montant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cotisations as $cotisation)
                                    <tr>
                                        <td>{{ $cotisation->type_cotisation_nom }}</td>
                                        <td>{{ $cotisation->montant }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-icon-text btn-sm" data-toggle="modal" data-target="#modalModifierCotisation{{ $cotisation->id_cotisation }}">
                                                <i class="ti-pencil btn-icon-prepend"></i> Modifier
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal pour modifier la cotisation -->
                                    <div class="modal fade" id="modalModifierCotisation{{ $cotisation->id_cotisation }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier la Cotisation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('cotisation.update', $cotisation->id_cotisation) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="type_cotisation">Type de Cotisation</label>
                                                            <select name="id_type_cotisation" class="form-control">
                                                                <!-- Vérification que $typesCotisations contient des données -->
                                                                @foreach($typesCotisations as $type)
                                                                    <option value="{{ $type->id_type_cotisation }}" {{ $cotisation->id_type_cotisation == $type->id_type_cotisation ? 'selected' : '' }}>
                                                                        {{ $type->nom_cotisation }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="montant">Montant</label>
                                                            <input type="text" class="form-control" name="montant" value="{{ $cotisation->montant }}" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
