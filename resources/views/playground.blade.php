<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Playground</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form div { margin-bottom: 10px; }
        .travel { border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h1>Filtro de Viajes</h1>

    <form method="GET" action="{{ route('playground') }}">
        <div>
            <label for="minWorkers">Mínimo de trabajadores:</label>
            <input type="number" name="minWorkers" id="minWorkers" value="{{ request('minWorkers') }}">
        </div>
        <div>
            <label for="minPrice">Precio mínimo:</label>
            <input type="number" name="minPrice" step="0.01" id="minPrice" value="{{ request('minPrice') }}">
        </div>
        <div>
            <label for="maxPrice">Precio máximo:</label>
            <input type="number" name="maxPrice" step="0.01" id="maxPrice" value="{{ request('maxPrice') }}">
        </div>
        <button type="submit">Buscar</button>
    </form>

    <h2>Viajes encontrados</h2>

    @forelse ($travels as $travel)
        <div class="travel">
            <p><strong>Origen:</strong> {{ $travel->origin }}</p>
            <p><strong>Destino:</strong> {{ $travel->destination }}</p>
            <p><strong>Salida:</strong> {{ $travel->departDate }}</p>
            <p><strong>Vuelta:</strong> {{ $travel->returnDate }}</p>
            <p><strong>Precio:</strong> €{{ number_format($travel->price, 2) }}</p>
            <p><strong>Tipo:</strong> {{ $travel->type->name }}</p>
            <p><strong>Trabajadores:</strong></p>
            <ul>
                @foreach ($travel->workers as $worker)
                    <li>{{ $worker->name }} ({{ $worker->email }})</li>
                @endforeach
            </ul>
        </div>
    @empty
        <p>No se encontraron viajes con esos filtros.</p>
    @endforelse

</body>
</html>
