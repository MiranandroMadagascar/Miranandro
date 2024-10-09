@extends('layout.admin')
@section('title', 'Liste des enfants ayant réussi les examens nationaux')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enfants ou ados ayant réussi les examens nationaux</h4>

                    <!-- Filtre par année -->
                    <form method="GET" action="{{ route('membres_enfants.examens_reussis') }}">
                        <div class="form-group row">
                            <label for="annee" class="col-sm-2 col-form-label">Année scolaire :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="annee" name="annee" value="{{ request('annee') }}" placeholder="Ex: 2023-2024">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Filtrer</button>
                            </div>
                        </div>
                    </form>

                    <!-- Tableau des enfants ayant réussi -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Date de naissance</th>
                                <th>Classe</th>
                                <th>École</th>
                                <th>Année scolaire</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enfants as $enfant)
                                <tr>
                                    <td>{{ $enfant->nom }}</td>
                                    <td>{{ $enfant->prenoms }}</td>
                                    <td>{{ \Carbon\Carbon::parse($enfant->date_naissance)->format('d/m/Y') }}</td>
                                    <td>{{ $enfant->classe }}</td>
                                    <td>{{ $enfant->ecole }}</td>
                                    <td>{{ $enfant->annee_scolaire }}</td>
                                    <td>{{ $enfant->contact }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Aucun enfant trouvé pour l'année scolaire spécifiée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
@endsection
