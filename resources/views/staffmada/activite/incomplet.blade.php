@extends('layout.admin')
@section('title', 'Activités Incomplètes')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Activités Incomplètes</h4>
                        <div class="tab-pane fade show active" id="sans-fiche" role="tabpanel" aria-labelledby="sans-fiche-tab">
                            <code>Activités Sans Fiche Technique(sans dépenses)</code>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Type d'activité</th>
                                            <th>Section Responsable</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($activitesSansFiche as $activite)
                                        <tr>
                                            <td>{{ $activite->titre_activite }}</td>
                                            <td>{{ $activite->type_activite }}</td>
                                            <td>{{ $activite->nom_section }}</td>
                                            <td>{{ $activite->date_activite }}</td>
                                            <td>{{ $activite->heure_debut }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-icon-text btn-sm" onclick="openModifierModal({{ json_encode($activite) }})">
                                                    <i class="ti-pencil btn-icon-prepend"></i>
                                                    Modifier
                                                </button>
                                                <button type="button" class="btn btn-primary btn-icon-text btn-sm" data-toggle="modal" data-target="#ficheTechniqueModal">
                                                    <i class="ti-file btn-icon-prepend"></i>
                                                    + Fiche technique
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Ajout du modal pour fiche technique-->
                                        <div class="modal fade" id="ficheTechniqueModal" tabindex="-1" role="dialog" aria-labelledby="ficheTechniqueModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ficheTechniqueModalLabel">Ajouter Fiche Technique</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="ficheTechniqueForm" method="POST" action="{{ route('ficheTechnique.inserer') }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="objectif">Objectif</label>
                                                                <textarea name="objectif" class="form-control" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="methodologie">Méthodologie</label>
                                                                <textarea name="methodologie" class="form-control" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="participants">Participants</label>
                                                                <textarea name="participants" class="form-control" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="justifications">Justifications</label>
                                                                <textarea name="justifications" class="form-control" required></textarea>
                                                            </div>
                                                            <input type="hidden" name="id_activite" value="{{ $activite->id_activite}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" name="ajouter_depenses" class="btn btn-info">Valider et ajouter Dépenses</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination pour Sans Fiche -->
                            <div class="pagination mt-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item {{ $activitesSansFiche->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $activitesSansFiche->previousPageUrl() }}&tab=sans-fiche" tabindex="-1" aria-disabled="true">&laquo;</a>
                                        </li>
                                        @for ($i = 1; $i <= $activitesSansFiche->lastPage(); $i++)
                                            <li class="page-item {{ $i == $activitesSansFiche->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $activitesSansFiche->url($i) }}&tab=sans-fiche">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ $activitesSansFiche->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $activitesSansFiche->nextPageUrl() }}&tab=sans-fiche">&raquo;</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        

                    <!-- Ajout du modal pour modifier l'activité -->
                    <div class="modal fade" id="modifierActiviteModal" tabindex="-1" role="dialog" aria-labelledby="modifierActiviteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg pour une taille plus grande -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifierActiviteModalLabel">Modifier l'Activité</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="modifierActiviteForm" action="{{ route('activites.incomplet.update', $activite->id_activite) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_activite" id="id_activite">

                                        <div class="row"> <!-- Utilisation de la grille Bootstrap -->
                                            <div class="col-md-6"> <!-- Colonne de gauche -->
                                                <div class="form-group">
                                                    <label for="titre">Titre</label>
                                                    <input type="text" class="form-control" name="titre" id="titre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_activite">Date</label>
                                                    <input type="date" class="form-control" name="date_activite" id="date_activite" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="heure_debut">Heure de Début</label>
                                                    <input type="time" class="form-control" name="heure_debut" id="heure_debut" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lieu">Lieu</label>
                                                    <input type="text" class="form-control" name="lieu" id="lieu" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6"> <!-- Colonne de droite -->
                                                <div class="form-group">
                                                    <label for="id_type_activite">Type d'Activité</label>
                                                    <select class="form-control" name="id_type_activite" id="id_type_activite" required>
                                                        @foreach($typesActivites as $type)
                                                            <option value="{{ $type->id_type_activite }}">{{ $type->nom_activite }}</option> <!-- Assurez-vous que ces propriétés existent -->
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="heure_fin">Heure de Fin</label>
                                                    <input type="time" class="form-control" name="heure_fin" id="heure_fin" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var activeTab = urlParams.get('tab') || 'sans-fiche';

        $('#myTab a[href="#' + activeTab + '"]').tab('show');

        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            var newTab = $(this).attr('href').substring(1);
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=' + newTab;

            window.history.pushState({ path: newUrl }, '', newUrl);

            $(this).tab('show');
        });
    });
</script>
<script>
    function openModifierModal(activite) {
        $('#id_activite').val(activite.id_activite);
        $('#titre').val(activite.titre_activite);
        $('#id_type_activite').val(activite.id_type_activite);
        $('#date_activite').val(activite.date_activite);
        $('#heure_debut').val(activite.heure_debut);
        $('#heure_fin').val(activite.heure_fin);
        $('#lieu').val(activite.lieu_activite);
        $('#modifierActiviteModal').modal('show');
    }

    console.log(activite.id_activite);
    

    $('#ficheTechniqueForm input[name="id_activite"]').val(activite.id_activite);

    $(document).ready(function() {
        $('#modifierActiviteForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#id_activite').val();
            const data = $(this).serialize();

            $.ajax({
                url: `/staffmada/activites/${id}`, // Utilisez l'URL appropriée
                type: 'PUT',
                data: data,
                success: function(response) {
                    // Optionnel: utilisez une notification ou un message de succès
                    $('#modifierActiviteModal').modal('hide'); // Fermez le modal après la mise à jour
                    location.reload(); // Rechargez la page ou mettez à jour la table
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        });
    });
</script>
<script>
    document.getElementById('addExpenseButton').addEventListener('click', function() {
        var container = document.getElementById('expenseContainer');
        var newRow = document.createElement('div');
        newRow.className = 'form-row';
        newRow.innerHTML = `...`; // Réutilisez le code HTML de la ligne de dépense ici
        container.appendChild(newRow);
    });
</script>
@endpush
