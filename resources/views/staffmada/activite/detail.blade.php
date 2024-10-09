@extends('layout.admin')

@section('title', 'Détails de l\'Activité')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/fiche.css') }}">
@endsection

@section('content')
<div class="container">
    <img src="{{ asset('images/logo.png') }}" alt="Logo de l'association" class="logo">
    <h1>Fiche Technique</h1>

    @if($activite)
        <table>
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Informations sur l'Activité</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Activité</strong></td>
                    <td>{{ $activite->titre_activite }}</td>
                </tr>
                <tr>
                    <td><strong>Section Responsable</strong></td>
                    <td>{{ $activite->nom_section }}</td>
                </tr>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>{{ \Carbon\Carbon::parse($activite->date_activite)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Objectif</strong></td>
                    <td>{{ $activite->objectif }}</td>
                </tr>
                <tr>
                    <td><strong>Méthodologie</strong></td>
                    <td>{{ $activite->methodologie }}</td>
                </tr>
                <tr>
                    <td><strong>Lieu</strong></td>
                    <td>{{ $activite->lieu_activite }}</td>
                </tr>
                <tr>
                    <td><strong>Participants</strong></td>
                    <td>{{ $activite->participants }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="4" class="text-center">Budget Prévisionnel</th>
                </tr>
                <tr>
                    <th>Désignation</th>
                    <th>PU</th>
                    <th>Nombre</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activite->depenses as $depense)
                <tr>
                    <td>{{ $depense->designation_depense }}</td>
                    <td>{{ number_format($depense->prix_unitaire_depense, 0, ',', ' ') }} Ar</td>
                    <td>{{ $depense->quantite_depense }}</td>
                    <td>{{ number_format($depense->montant_total_depense, 0, ',', ' ') }} Ar</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total"><strong>TOTAL</strong></td>
                    <td class="total"><strong>{{ number_format($activite->budget_previsionnel_total, 0, ',', ' ') }} Ar</strong></td>
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td><strong>Justification</strong></td>
                    <td>{{ $activite->justifications }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Ajouter cette section pour le modal -->
        <div class="modal fade" id="refuseModal" tabindex="-1" role="dialog" aria-labelledby="refuseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="refuseModalLabel">Refuser l'Activité</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('activite.refuser', ['id' => $activite->id_activite]) }}" method="POST" id="refuseForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="commentaire">Motif du refus</label>
                                <textarea name="commentaire" id="commentaire" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <a href="{{ route('activite.export.pdf2', ['id' => $activite->id_activite]) }}" class="btn btn-primary">Export PDF</a>
        <button id="valider" class="btn btn-success">Valider</button>
        <button id="refuser" class="btn btn-danger" data-toggle="modal" data-target="#refuseModal">Refuser</button>
        <a href="{{ route('activite.enAttente') }}" class="btn btn-secondary">Retour</a>
    @else
        <p class="text-center">Aucune activité à afficher pour le moment.</p>
        <a href="{{ route('activite.enAttente') }}" class="btn btn-secondary">Retour</a>
    @endif

    <div class="footer">
        &copy; 2024 Association MIRANANDRO. Tous droits réservés.
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('valider').addEventListener('click', function() {
        if (confirm("Êtes-vous sûr de vouloir valider cette activité ?")) {
            window.location.href = "{{ route('activite.valider', ['id' => $activite->id_activite]) }}";
        }
    });

    // document.getElementById('refuser').addEventListener('click', function() {
    //     if (confirm("Êtes-vous sûr de vouloir refuser cette activité ?")) {
    //         window.location.href = "{{ route('activite.refuser', ['id' => $activite->id_activite]) }}";
    //     }
    // });
</script>
<script>
    document.getElementById('refuser').addEventListener('click', function(event) {
        // Empêche tout rafraîchissement de page
        event.preventDefault();
        // Affiche le modal
        $('#refuseModal').modal('show');
    });
</script>
@endpush
