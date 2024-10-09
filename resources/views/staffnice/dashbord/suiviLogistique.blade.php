@extends('layout.director')
@section('title', 'Suivi Logistique')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Suivi des logistiques (Stock disponible)</h4>

                    <!-- Tableau des logistiques -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom de l'article</th>
                                <th>Catégorie</th>
                                <th>Description</th>
                                <th>Quantité disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logistiques as $logistique)
                                <tr>
                                    <td>{{ $logistique->nom_article }}</td>
                                    <td>{{ $logistique->categorie_logistique }}</td>
                                    <td>{{ $logistique->description }}</td>
                                    <td>{{ $logistique->quantite_disponible }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Aucun article logistique disponible.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination mt-3">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $logistiques->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $logistiques->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                </li>
                                @for ($i = 1; $i <= $logistiques->lastPage(); $i++)
                                    <li class="page-item {{ $i == $logistiques->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $logistiques->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $logistiques->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $logistiques->nextPageUrl() }}">&raquo;</a>
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
