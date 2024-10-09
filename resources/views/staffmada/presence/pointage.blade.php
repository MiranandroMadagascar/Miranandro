@extends('layout.admin')
@section('title', 'Pointage')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h1>Fiche de Présence pour {{ $activite->titre }}</h1>
                    <p>Date : {{ $activite->date_activite  }}</p>

                    <!-- Filtre par section -->
                    <div class="form-group">
                        <label for="sectionFilter">Filtrer par section :</label>
                        <select id="sectionFilter" class="form-control" onchange="filterBySection()">
                            <option value="all">Toutes les sections</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id_section }}" {{ request('section') == $section->id_section ? 'selected' : '' }}>
                                    {{ $section->section }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Formulaire de présence -->
                    <form id="presenceForm" action="{{ route('presence.enregistrer', $activite->id_activite) }}" method="POST">
                        @csrf
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Numéro Membre</th>
                                    <th>Nom du Membre</th>
                                    <th>Présent (✓)</th>
                                </tr>
                            </thead>
                            <tbody id="membresList">
                            @foreach($membres as $membre)
                                <tr class="section-{{ $membre->id_section }}">
                                    <td>{{ $membre->numero_membre }}</td>
                                    <td>{{ $membre->nom_membre }} {{ $membre->prenoms_membre }}</td>
                                    <td>
                                        <input type="checkbox" name="presences[{{ $membre->id_membre_adherent }}]" value="1"> <!-- Le nom est maintenant basé sur id_membre_adherent -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="actions">
                            <button type="button" class="btn btn-primary" onclick="selectAll()">Sélectionner tout</button>
                            <button type="button" class="btn btn-secondary" onclick="deselectAll()">Désélectionner tout</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>

                        <div class="pagination mt-3">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $membres->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $membres->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo;</a>
                                    </li>
                                    @for ($i = 1; $i <= $membres->lastPage(); $i++)
                                    <li class="page-item {{ $i == $membres->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $membres->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item {{ $membres->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $membres->nextPageUrl() }}">&raquo;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Fonction pour rediriger vers la route de filtrage par section
    function filterBySection() {
        const sectionId = document.getElementById('sectionFilter').value;
        const activiteId = "{{ $activite->id_activite }}";
        const url = `/staffmada/presence/filtrer/${activiteId}/${sectionId}`;
        window.location.href = url; // Redirection vers la nouvelle route de filtrage
    }

    // Fonction pour sélectionner tous les membres
    function selectAll() {
        document.querySelectorAll('#membresList input[type="checkbox"]').forEach(cb => cb.checked = true);
    }

    // Fonction pour désélectionner tous les membres
    function deselectAll() {
        document.querySelectorAll('#membresList input[type="checkbox"]').forEach(cb => cb.checked = false);
    }
</script>
@endpush