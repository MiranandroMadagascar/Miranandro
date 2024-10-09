<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport de Réunion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .meeting-card {
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .meeting-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .meeting-info {
            margin-bottom: 10px;
        }
        .meeting-info h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="meeting-card">
        <div class="meeting-title">Titre{{ $rapport->titre_activite }}</div>
        <div class="meeting-info">
            <h5>Date</h5>
            <p>{{ $rapport->date_activite }}</p>
        </div>
        <div class="meeting-info">
            <h5>Ordre du Jour</h5>
            <p>{{ $rapport->ordre_du_jour }}</p>
        </div>
        <div class="meeting-info">
            <h5>Procès Verbal</h5>
            <p>{{ $rapport->proces_verbal }}</p>
        </div>
        <div class="meeting-info">
            <h5>Rapport</h5>
            <p>{{ $rapport->rapport }}</p>
        </div>
    </div>
</body>
</html>
