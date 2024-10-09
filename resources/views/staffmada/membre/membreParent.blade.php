@extends('layout.admin')
@section('title', 'Membres Parents')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listes des Parents/Tuteurs</h4>

                    <!-- Formulaire de recherche multicritères -->
                    <form action="{{ route('membres.parents') }}" method="GET" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <input type="text" name="pere" class="form-control" placeholder="Père" value="{{ request()->pere }}">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" name="mere" class="form-control" placeholder="Mère" value="{{ request()->mere }}">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" name="tuteur" class="form-control" placeholder="Tuteur" value="{{ request()->tuteur }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>

                    <p></p>

                    @if (session('success'))
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

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Numéro du Père</th>
                                    <th>Nom du Père</th>
                                    <th>Profession du Père</th>
                                    <th>Numéro de la Mère</th>
                                    <th>Nom de la Mère</th>
                                    <th>Profession de la Mère</th>
                                    <th>Numéro du Tuteur</th>
                                    <th>Nom du Tuteur</th>
                                    <th>Profession du Tuteur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($parents as $parent)
                                    <tr>
                                        <td>{{ $parent->numero_pere }}</td>
                                        <td>{{ $parent->nom_pere }} {{ $parent->prenom_pere }}</td>
                                        <td>{{ $parent->profession_pere }}</td>
                                        <td>{{ $parent->numero_mere }}</td>
                                        <td>{{ $parent->nom_mere }} {{ $parent->prenom_mere }}</td>
                                        <td>{{ $parent->profession_mere }}</td>
                                        <td>{{ $parent->numero_tuteur }}</td>
                                        <td>{{ $parent->nom_tuteur }} {{ $parent->prenom_tuteur }}</td>
                                        <td>{{ $parent->profession_tuteur }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-icon-text btn-sm" data-toggle="modal" data-target="#enfantModal" data-pere="{{ $parent->id_tuteur }}" data-mere="{{ $parent->id_mere }}" data-tuteur="{{ $parent->id_tuteur }}">
                                                <i class="ti-plus btn-icon-prepend"></i>Ajouter enfant
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">Aucun membre trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="pagination mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $parents->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $parents->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    @for ($i = 1; $i <= $parents->lastPage(); $i++)
                                        <li class="page-item {{ $i == $parents->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $parents->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $parents->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $parents->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Modal d'ajout d'enfant -->
                        <div class="modal fade" id="enfantModal" tabindex="-1" role="dialog" aria-labelledby="enfantModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document"> 
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="enfantModalLabel">Ajouter un Enfant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('membres.enfants.nouveau') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_pere" id="id_pere" value="">
                                            <input type="hidden" name="id_mere" id="id_mere" value="">
                                            <input type="hidden" name="id_tuteur" id="id_tuteur" value="">

                                            <div class="form-group">
                                                <label for="nom">Nom & Prénoms</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="prenoms" name="prenoms" placeholder="Prénoms" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date_naissance">Date de Naissance & Genre</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" id="genre" name="genre" required>
                                                            <option value="">Genre</option>
                                                            <option value="H">Homme</option>
                                                            <option value="F">Femme</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="contact">Contact & Adresse</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="contact">Ecole & Classe</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="ecole" name="ecole" placeholder="Ecole" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="classe" class="form-control">
                                                            <option>Terminale</option>
                                                            <option>Seconde</option>
                                                            <option>Première</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="annee_scolaire">Année Scolaire</label>
                                                <input type="text" class="form-control" id="annee_scolaire" name="annee_scolaire" placeholder="Année Scolaire" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="fratrie">Fratrie</label>
                                                <input type="number" class="form-control" id="fratrie" name="fratrie" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- table-responsive -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-lg-12 -->
    </div> <!-- row -->
</div> <!-- content-wrapper -->
@endsection
@push('scripts')
<script>
    $('#enfantModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idPere = button.data('pere');
        var idMere = button.data('mere');
        var idTuteur = button.data('tuteur');

        var modal = $(this);
        modal.find('#id_pere').val(idPere);
        modal.find('#id_mere').val(idMere);
        modal.find('#id_tuteur').val(idTuteur);
    });
</script>
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