<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demandes de rappel</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f7fb;
            padding:30px;
        }
        .container{
            max-width:1000px;
            margin:auto;
            background:#fff;
            padding:25px;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }
        h1{
            margin-bottom:20px;
        }
        table{
            width:100%;
            border-collapse: collapse;
        }
        table th, table td{
            border:1px solid #ddd;
            padding:12px;
            text-align:left;
        }
        table th{
            background:#0d6efd;
            color:#fff;
        }
        tr:nth-child(even){
            background:#f9fafb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Demandes de rappel</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rappels as $rappel)
                    <tr>
                        <td>{{ $rappel->id }}</td>
                        <td>{{ $rappel->nom }}</td>
                        <td>{{ $rappel->telephone }}</td>
                        <td>{{ $rappel->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Aucune demande de rappel pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
