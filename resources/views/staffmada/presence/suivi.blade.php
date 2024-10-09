@extends('layout.admin')
@section('title', 'Suivi de présence')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Suivi de présence par activité</h4>

                    <form action="{{ route('presence.suivi') }}" method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Rechercher par titre" value="{{ request()->get('search') }}">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titre de l'activité</th>
                                <th>Section responsable</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Lieu</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activites as $activite)
                                <tr>
                                    <td>{{ $activite->titre_activite }}</td>
                                    <td>{{ $activite->section_responsable }}</td>
                                    <td>{{ $activite->date_activite }}</td>
                                    <td>{{ $activite->heure_debut }} - {{ $activite->heure_fin }}</td>
                                    <td>{{ $activite->lieu_activite }}</td>
                                    <td>
                                        <a href="{{ route('presence.show', $activite->id_activite) }}" class="btn btn-info">Voir fiche de présence</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Aucune activité trouvée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $activites->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $activites->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $activites->lastPage(); $i++)
                                <li class="page-item {{ $i == $activites->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $activites->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                                <li class="page-item {{ $activites->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $activites->nextPageUrl() }}">&raquo;</a>
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
