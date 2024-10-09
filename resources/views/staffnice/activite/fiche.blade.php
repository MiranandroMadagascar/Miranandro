@extends('layout.director')

@section('title', 'Fiche Technique')

@section('head')
<link rel="stylesheet" href="{{ asset('css/fiche.min.css') }}">
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

        <a href="{{ route('activite.export.pdf3', ['id' => $activite->id_activite]) }}" class="btn btn-primary">Export PDF</a>
        <button id="valider" class="btn btn-success">Valider</button>

        <!-- Bouton pour ouvrir le modal de refus -->
        <button id="refuserBtn" class="btn btn-danger" data-toggle="modal" data-target="#refuserModal">Refuser</button>
        <a href="{{ route('activite.validation') }}" class="btn btn-secondary">Retour</a>
    @else
        <p class="text-center">Aucune activité à afficher pour le moment.</p>
        <a href="{{ route('activite.validation') }}" class="btn btn-secondary">Retour</a>
    @endif

    <div class="footer">
        &copy; 2024 Association MIRANANDRO. Tous droits réservés.
    </div>
</div>

<!-- Modal pour saisir le motif de refus -->
<div class="modal fade" id="refuserModal" tabindex="-1" role="dialog" aria-labelledby="refuserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="refuserModalLabel">Motif de refus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('activite.refuser2', ['id' => $activite->id_activite]) }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="commentaire">Veuillez entrer le motif du refus :</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Refuser l'activité</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('valider').addEventListener('click', function() {
        if (confirm("Êtes-vous sûr de vouloir valider cette activité ?")) {
            window.location.href = "{{ route('activite.valider2', ['id' => $activite->id_activite]) }}";
        }
    });
</script>
@endpush
