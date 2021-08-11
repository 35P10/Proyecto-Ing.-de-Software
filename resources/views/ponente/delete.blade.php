<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ponentes</title>
</head>
<body>
    @foreach($ponentes as $ponente)
        <h3>{{ $ponente->nombre }}</h3>
    @endforeach
</body>
</html>