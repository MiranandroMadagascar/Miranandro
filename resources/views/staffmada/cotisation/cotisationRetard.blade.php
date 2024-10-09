@extends('layout.admin')
@section('title', 'Cotisations en Retard')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Suivi de Cotisation - Cotisations en Retard</h4>
                    
                    <!-- Navigation des onglets avec style -->
                    <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="parental-tab" data-toggle="tab" href="#parental" role="tab" aria-controls="parental" aria-selected="true">
                                <i class="mdi mdi-account-group"></i> Cotisations Parentales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="false">
                                <i class="mdi mdi-account"></i> Cotisations Actives
                            </a>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Section Cotisation Parentale -->
                        <div class="tab-pane fade show active" id="parental" role="tabpanel" aria-labelledby="parental-tab">
                            <h5 class="card-subtitle mb-2 text-primary">Cotisations Parentales</h5>
                            <div class="table-responsive">
                                <table class="table table-hover table-styled">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Année en Retard</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cotisationsParentales as $cotisation)
                                        <tr>
                                            <td>{{ $cotisation->numero }}</td>
                                            <td>{{ $cotisation->nom }}</td>
                                            <td>{{ $cotisation->prenoms }}</td>
                                            <td>{{ $cotisation->annee_retard }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-icon-text btn-sm" 
                                                    onclick="openPaiementModalParentale({{ $cotisation->id }}, '{{ $cotisation->prenoms }}')">
                                                    <i class="ti-credit-card"></i> Payer
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Pagination  parentale-->
                            <div class="pagination mt-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item {{ $cotisationsParentales->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $cotisationsParentales->previousPageUrl() }}&tab=parental" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                        @for ($i = 1; $i <= $cotisationsParentales->lastPage(); $i++)
                                            <li class="page-item {{ $i == $cotisationsParentales->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $cotisationsParentales->url($i) }}&tab=parental">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ $cotisationsParentales->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $cotisationsParentales->nextPageUrl() }}&tab=parental">&raquo;</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>

                        <!-- Section Cotisation Active -->
                        <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                            <h5 class="card-subtitle mb-2 text-primary">Cotisations Actives</h5>
                            <div class="table-responsive">
                                <table class="table table-hover table-styled">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Année en Retard</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cotisationsActives as $cotisation)
                                        <tr>
                                            <td>{{ $cotisation->numero }}</td>
                                            <td>{{ $cotisation->nom }}</td>
                                            <td>{{ $cotisation->prenoms }}</td>
                                            <td>{{ $cotisation->annee_retard }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-icon-text btn-sm" 
                                                    onclick="openPaiementModalActive({{ $cotisation->id }}, '{{ $cotisation->prenoms }}')">
                                                    <i class="ti-credit-card"></i> Payer
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination active-->
                            <div class="pagination mt-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item {{ $cotisationsActives->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $cotisationsActives->previousPageUrl() }}&tab=active" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                        @for ($i = 1; $i <= $cotisationsActives->lastPage(); $i++)
                                            <li class="page-item {{ $i == $cotisationsActives->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $cotisationsActives->url($i) }}&tab=active">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ $cotisationsActives->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $cotisationsActives->nextPageUrl() }}&tab=active">&raquo;</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Cotisation Parentale -->
                    <div class="modal fade" id="paiementModalParentale" tabindex="-1" role="dialog" aria-labelledby="paiementModalParentaleLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paiementModalParentaleLabel">Paiement de la Cotisation Parentale</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="paiementFormParentale" method="POST" action="{{ route('paiement.cotisation') }}">
                                        @csrf
                                        <input type="hidden" id="idCotisationParentale" name="idCotisation">
                                        <input type="hidden" id="typeCotisationParentale" name="typeCotisation" value="parentale">
                                        <div class="form-group">
                                            <label for="prenomParentale">Prénoms</label>
                                            <input type="text" class="form-control" id="prenomParentale" name="prenom" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_payement_parentale">Date de Paiement</label>
                                            <input type="date" class="form-control" id="date_payement_parentale" name="date_payement" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Confirmer le Paiement</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Cotisation Active -->
                    <div class="modal fade" id="paiementModalActive" tabindex="-1" role="dialog" aria-labelledby="paiementModalActiveLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paiementModalActiveLabel">Paiement de la Cotisation Active</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="paiementFormActive" method="POST" action="{{ route('paiement.cotisation') }}">
                                        @csrf
                                        <input type="hidden" id="idCotisationActive" name="idCotisation">
                                        <input type="hidden" id="typeCotisationActive" name="typeCotisation" value="active">
                                        <div class="form-group">
                                            <label for="prenomActive">Prénoms</label>
                                            <input type="text" class="form-control" id="prenomActive" name="prenom" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_payement_active">Date de Paiement</label>
                                            <input type="date" class="form-control" id="date_payement_active" name="date_payement" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Confirmer le Paiement</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        // Vérifier l'onglet actif à partir du localStorage
        var activeTab = localStorage.getItem('activeTab') || 'parental-tab';
        $('#' + activeTab + ' a').tab('show');

        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
            // Enregistrer l'onglet actif dans le localStorage
            localStorage.setItem('activeTab', $(this).attr('id'));
        });
    });

    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var activeTab = urlParams.get('tab');
        
        if (activeTab === 'active') {
            $('#myTab a[href="#active"]').tab('show');
        } else {
            $('#myTab a[href="#parental"]').tab('show');
        }
    });

    function openPaiementModalParentale(id, prenom) {
        $('#idCotisationParentale').val(id);
        $('#prenomParentale').val(prenom);
        $('#paiementModalParentale').modal('show');
    }

    function openPaiementModalActive(id, prenom) {
        $('#idCotisationActive').val(id);
        $('#prenomActive').val(prenom);
        $('#paiementModalActive').modal('show');
    }
</script>
@endpush
