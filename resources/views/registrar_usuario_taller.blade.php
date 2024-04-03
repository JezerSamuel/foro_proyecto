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

        <label for="taller">Selecciona el taller:</label>
        <select id="taller" name="taller" required>
            <option value="">Selecciona un taller</option>
            @foreach ($talleres as $taller)
                <option value="{{ $taller->id }}">{{ $taller->name }}</option>
            @endforeach
        </select>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
