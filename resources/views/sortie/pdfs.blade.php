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
    <h1>Sorties</h1>
    <table>
        <thead>
            <tr>
            <th >Numero de sortie</th>
                        <th>Date de la sortie</th>
                        <th>Nombre des articles</th>
                        <th >Nom du beneficiaire</th>
                       

            </tr>
        </thead>
        <tbody>
            @foreach ($sorties as $Sortie)
            <tr>
                < <td>{{ $Sortie->numsortie }}</td>
                        <td >{{ $Sortie->datesortie }}</td>
                        <td>{{ $Sortie->nbr_article_sortie }}</td>
                        <td>{{ $Sortie->nombeneficiaire }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
