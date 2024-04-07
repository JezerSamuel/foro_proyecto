<!-- resources/views/registrar_usuario_evento.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario en Evento</title>
</head>
<body>
    <h1>Registrar Usuario en Evento</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('registrar.usuario.evento') }}">
        @csrf

        <label for="folio">Folio:</label>
        <input type="text" id="folio" name="folio" required>

        <label>Selecciona los talleres:</label><br>
        @foreach ($talleres as $taller)
            <input type="checkbox" id="taller_{{ $taller->id }}" name="talleres[]" value="{{ $taller->id }}">
            <label for="taller_{{ $taller->id }}">{{ $taller->name }}</label><br>
        @endforeach

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
