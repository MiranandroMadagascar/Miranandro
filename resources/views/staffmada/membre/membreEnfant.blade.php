@extends('layout.admin')
@section('title', 'Membres Enfants')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listes des Enfants (Ankizin'ny MIRANANDRO)</h4>

                    <!-- Formulaire de recherche multicritères -->
                    <form action="{{ route('membres.enfants') }}" method="GET" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ request()->nom }}">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" name="prenoms" class="form-control" placeholder="Prénoms" value="{{ request()->prenoms }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>

                    <div class="col-auto mb-3">
                        <a href="{{ route('membres.beneficiaires') }}" class="btn btn-info btn-icon-text btn-sm">
                            <i class="ti-file btn-icon-prepend"></i> Créer
                        </a>
                    </div>

                    <div class="col-auto mb-3">
                        <a href="{{ route('membres_enfants.examens_reussis') }}" class="btn btn-inverse-warning btn-fw">
                            <i class="ti-book btn-icon-prepend"></i> Suivi d'examens
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Noms</th>
                                    <th>Prénoms</th>
                                    <th>Date de Naissance</th>
                                    <th>Genre</th>
                                    <th>Contact</th>
                                    <th>Adresse</th>
                                    <th>Classe</th>
                                    <th>Ecole</th>
                                    <th>Année Scolaire</th>
                                    <th>Père</th>
                                    <th>Mère</th>
                                    <th>Tuteur</th>
                                    <th>Contact Parents</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enfants as $enfant)
                                    <tr>
                                        <td>{{ $enfant->numero }}</td>
                                        <td>{{ $enfant->nom }}</td>
                                        <td>{{ $enfant->prenoms }}</td>
                                        <td>{{ $enfant->date_naissance }}</td>
                                        <td>{{ $enfant->genre }}</td>
                                        <td>{{ $enfant->contact }}</td>
                                        <td>{{ $enfant->adresse }}</td>
                                        <td>{{ $enfant->classe }}</td>
                                        <td>{{ $enfant->ecole }}</td>
                                        <td>{{ $enfant->annee_scolaire }}</td>
                                        <td>{{ $enfant->nom_pere }} {{ $enfant->prenoms_pere }}</td>
                                        <td>{{ $enfant->nom_mere }} {{ $enfant->prenoms_mere }}</td>
                                        <td>{{ $enfant->nom_tuteur }} {{ $enfant->prenoms_tuteur }}</td>
                                        <td>{{ $enfant->contact_pere }} - {{ $enfant->contact_mere }} - {{ $enfant->nom_tuteur }} </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-icon-text btn-sm" data-toggle="modal" data-target="#modifierModal{{ $enfant->id_membre_beneficiaire }}">
                                                <i class="ti-pencil btn-icon-prepend"></i>Modifier
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Aucun membre trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @foreach ($enfants as $enfant)
                            <div class="modal fade" id="modifierModal{{ $enfant->id_membre_beneficiaire }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $enfant->id_membre_beneficiaire }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifierModalLabel{{ $enfant->id_membre_beneficiaire }}">Modifier les informations de l'enfant</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('membres.enfants.update', $enfant->id_membre_beneficiaire) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nom">Nom</label>
                                                    <input type="text" name="nom" class="form-control" value="{{ $enfant->nom }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prenoms">Prénoms</label>
                                                    <input type="text" name="prenoms" class="form-control" value="{{ $enfant->prenoms }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_naissance">Date de Naissance</label>
                                                    <input type="date" name="date_naissance" class="form-control" value="{{ $enfant->date_naissance }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact">Contact</label>
                                                    <input type="text" name="contact" class="form-control" value="{{ $enfant->contact }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" name="adresse" class="form-control" value="{{ $enfant->adresse }}" required>
                                                </div>
                                                <!-- Ajoutez d'autres champs si nécessaire -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- Pagination -->
                        <div class="pagination mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $enfants->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $enfants->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    @for ($i = 1; $i <= $enfants->lastPage(); $i++)
                                        <li class="page-item {{ $i == $enfants->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $enfants->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $enfants->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $enfants->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush