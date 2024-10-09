@extends('layout.admin')
@section('title', 'Réunions')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h1>Réunions sans rapport</h1>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Heure Début</th>
                                <th>Heure Fin</th>
                                <th>Lieu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reunions as $reunion)
                                <tr>
                                    <td>{{ $reunion->titre_activite }}</td>
                                    <td>{{ $reunion->date_activite }}</td>
                                    <td>{{ $reunion->heure_debut }}</td>
                                    <td>{{ $reunion->heure_fin }}</td>
                                    <td>{{ $reunion->lieu_activite }}</td>
                                    <td>
                                        <a href="{{ route('reunion.rapport', ['id_activite' => $reunion->id_activite]) }}" class="btn btn-primary">
                                            <i class="ti-archive btn-icon-prepend"></i> Faire un rapport
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $reunions->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $reunions->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $reunions->lastPage(); $i++)
                                    <li class="page-item {{ $i == $reunions->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $reunions->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $reunions->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $reunions->nextPageUrl() }}">&raquo;</a>
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
