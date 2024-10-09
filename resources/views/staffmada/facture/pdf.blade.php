<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .invoice-header img {
            max-height: 80px;
        }
        .invoice-header .invoice-info {
            text-align: right;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details h5 {
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .invoice-total {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo">
            <div class="invoice-info">
                <h2>Facture</h2>
                <p>Numéro de Facture : {{ $facture[0]->numero_facture  }}</p>
                <p>Date : {{ $facture[0]->date_facture }}</p>
            </div>
        </div>

        <div class="invoice-details">
            <h5>Responsable</h5>
            <p>{{ $facture[0]->nom_responsable }} {{ $facture[0]->prenoms_responsable }}</p>
        </div>

        <div class="invoice-details">
            <h5>Client</h5>
            <p>{{ $facture[0]->nom_client }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facture as $item)
                <tr>
                    <td>{{ $item->designation_detail }}</td>
                    <td>{{ $item->quantite_detail }}</td>
                    <td>{{ number_format($item->prix_unitaire_detail, 2, '.', ',') }} €</td>
                    <td>{{ number_format($item->montant_total_detail, 2, '.', ',') }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="invoice-total">
            Montant Total: {{ number_format($facture[0]->montant_facture_total , 2, '.', ',') }} AR
        </div>

        <div class="invoice-footer">
            Arreté à la somme de : {{ $facture[0]->montant_facture_total  }} AR
        </div>
    </div>
</body>
</html>
