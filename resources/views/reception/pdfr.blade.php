<!DOCTYPE html>
<html>
<head>
    <style>
        /* Define appropriate styles for the PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Receptions</h1>
    <table>
        <thead>
            <tr>
                <th>Numero de réception</th>
                <th>Date de la réception</th>
                <th>Nombre des articles</th>
                <th>Nom du fournisseur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receptions as $reception)
            <tr>
                <td>{{ $reception->numreception }}</td>
                <td>{{ $reception->datereception }}</td>
                <td>{{ $reception->nbrarticle }}</td>
                <td>{{ $reception->nomfour }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
