<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurer mon adresse de payements</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Configurer mon adresse de payementsr</h1>
        @if (Session::get('seccess'))
        <div class="alert alert -seuccess">{{Session::get(error)}}</div>
        @endif
        <form action="{{ route('particuliers.payements.updateconfiguration')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">API KEY :</label>
                <input type="text" class="form-control" id="name" name="api_key" required>
            </div>
            <div class="form-group">
                <label for="name">SITE ID:</label>
                <input type="text" class="form-control" id="name" name="site_id" required>
            </div>
            <div class="form-group">
                <label for="name">SECRET KEY:</label>
                <input type="text" class="form-control" id="name" name="secret_key" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
