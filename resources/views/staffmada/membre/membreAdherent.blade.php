@extends('layout.admin')
@section('title', 'Membres Adhérents')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listes des Membres Adhérents</h4>
                    
                    <!-- Formulaire de recherche multicritères -->
                    <form action="{{ route('membres.adherents') }}" method="GET" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ request()->nom }}">
                        </div>
                        <div class="form-group mr-2">
                            <input type="text" name="prenoms" class="form-control" placeholder="Prénoms" value="{{ request()->prenoms }}">
                        </div>
                        <div class="form-group mr-2">
                            <select name="section" class="form-control">
                                <option value="">Sélectionner une section</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id_section }}" {{ request()->section == $section->id_section ? 'selected' : '' }}>
                                        {{ $section->nom_section }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>

                    <div class="col-auto mb-3">
                        <a href="{{ route('membre.create') }}" class="btn btn-info btn-icon-text btn-sm">
                            <i class="ti-file btn-icon-prepend"></i> Créer
                        </a>
                    </div>

                    <!-- Table responsive pour éviter la coupure du contenu -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Section</th>
                                    <th>
                                        <a href="{{ route('membres.adherents', ['sort' => 'nom_membre', 'order' => ($sort == 'nom_membre' && $order == 'asc') ? 'desc' : 'asc']) }}">
                                            Noms <i class="ti-exchange-vertical btn-icon-prepend"></i>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('membres.adherents', ['sort' => 'prenoms_membre', 'order' => ($sort == 'prenoms_membre' && $order == 'asc') ? 'desc' : 'asc']) }}">
                                            Prénoms <i class="ti-exchange-vertical btn-icon-prepend"></i>
                                        </a>
                                    </th>
                                    <th>Date de Naissance</th>
                                    <th>Contact</th>
                                    <th>Adresse</th>
                                    <th>Date d'Adhésion</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($membres as $membre)
                                    <tr>
                                        <td>{{ $membre->numero_membre }}</td>
                                        <td>{{ $membre->section }}</td>
                                        <td>{{ $membre->nom_membre }}</td>
                                        <td>{{ $membre->prenoms_membre }}</td>
                                        <td>{{ $membre->date_naissance }}</td>
                                        <td>{{ $membre->contact }}</td>
                                        <td>{{ $membre->adresse }}</td>
                                        <td>{{ $membre->date_adhesion }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-icon-text btn-sm" data-toggle="modal" data-target="#modifierModal{{ $membre->id_membre_adherent }}">
                                                <i class="ti-pencil-alt"></i>
                                                Modifier
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
                    </div>

                    @foreach($membres as $membre)
                        <div class="modal fade" id="modifierModal{{ $membre->id_membre_adherent }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $membre->id_membre_adherent }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modifierModalLabel{{ $membre->id_membre_adherent }}">Modifier Membre</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('membres.update', $membre->id_membre_adherent) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nomMembre">Nom</label>
                                                    <input type="text" name="nom" class="form-control" id="nomMembre" value="{{ $membre->nom_membre }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="prenomsMembre">Prénoms</label>
                                                    <input type="text" name="prenoms" class="form-control" id="prenomsMembre" value="{{ $membre->prenoms_membre }}" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="dateNaissance">Date de Naissance</label>
                                                    <input type="date" name="date_naissance" class="form-control" id="dateNaissance" value="{{ $membre->date_naissance }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="contactMembre">Contact</label>
                                                    <input type="text" name="contact" class="form-control" id="contactMembre" value="{{ $membre->contact }}" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="adresseMembre">Adresse</label>
                                                    <input type="text" name="adresse" class="form-control" id="adresseMembre" value="{{ $membre->adresse }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dateAdhesion">Date d'Adhésion</label>
                                                    <input type="date" name="date_adhesion" class="form-control" id="dateAdhesion" value="{{ $membre->date_adhesion }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
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
                                <li class="page-item {{ $membres->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $membres->previousPageUrl() }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $membres->lastPage(); $i++)
                                    <li class="page-item {{ $i == $membres->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $membres->url($i) }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $membres->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $membres->nextPageUrl() }}&nom={{ request()->nom }}&prenoms={{ request()->prenoms }}&section={{ request()->section }}">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
