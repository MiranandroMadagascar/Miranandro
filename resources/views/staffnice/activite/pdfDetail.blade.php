<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Technique</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
            max-height: 80px;
        }

        h1 {
            text-align: center;
            color: #C7A428;
            margin-bottom: 20px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #C7A428;
            color: #fff;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .total {
            font-weight: bold;
            color: #b30000;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{ public_path('images/logo.png') }}" alt="Logo de l'association" class="logo">
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
                    <td>{{ $activite[0]->titre_activite }}</td>
                </tr>
                <tr>
                    <td><strong>Section Responsable</strong></td>
                    <td>{{ $activite->nom_section }}</td>
                </tr>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>{{ \Carbon\Carbon::parse($activite[0]->date_activite)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Objectif</strong></td>
                    <td>{{ $activite[0]->objectif }}</td>
                </tr>
                <tr>
                    <td><strong>Méthodologie</strong></td>
                    <td>{{ $activite[0]->methodologie }}</td>
                </tr>
                <tr>
                    <td><strong>Lieu</strong></td>
                    <td>{{ $activite[0]->lieu_activite }}</td>
                </tr>
                <tr>
                    <td><strong>Participants</strong></td>
                    <td>{{ $activite[0]->participants }}</td>
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
                @foreach($activite as $depense)
                <tr>
                    <td>{{ $depense->designation_depense }}</td>
                    <td>{{ number_format($depense->prix_unitaire_depense, 0, ',', ' ') }} Ar</td>
                    <td>{{ $depense->quantite_depense }}</td>
                    <td>{{ number_format($depense->montant_total_depense, 0, ',', ' ') }} Ar</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total"><strong>TOTAL</strong></td>
                    <td class="total"><strong>{{ number_format($activite[0]->budget_previsionnel_total, 0, ',', ' ') }} Ar</strong></td>
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td><strong>Justification</strong></td>
                    <td>{{ $activite[0]->justifications }}</td>
                </tr>
            </tbody>
        </table>
    @endif

</div>
</body>
</html>
