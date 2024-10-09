@extends('layout.admin')
@section('title', 'Pointage des Activités Validées')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Activités Validées sans Présences</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Date</th>
                                    <th>Lieu</th>
                                    <th>Heure</th>
                                    <th>Type d'Activité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activitesSansPresences as $activite)
                                <tr>
                                    <td>{{ $activite->titre_activite }}</td>
                                    <td>{{ $activite->date_activite }}</td>
                                    <td>{{ $activite->lieu_activite }}</td>
                                    <td>{{ $activite->heure_debut }} jusqu' à {{ $activite->heure_fin }}</td>
                                    <td>{{ $activite->type_activite }}</td>
                                    <td>
                                        <a href="{{ route('presence.pointage', $activite->id_activite) }}" class="btn btn-primary btn-sm">
                                            <i class="ti-pencil-alt2 btn-icon-prepend"></i> Pointage 
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Aucune activité enregistrées pour le moment.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="pagination mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $activitesSansPresences->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $activitesSansPresences->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    @for ($i = 1; $i <= $activitesSansPresences->lastPage(); $i++)
                                    <li class="page-item {{ $i == $activitesSansPresences->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $activitesSansPresences->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item {{ $activitesSansPresences->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $activitesSansPresences->nextPageUrl() }}">&raquo;</a>
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
