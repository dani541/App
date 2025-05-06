<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Crear Viaje</title>
</head>
<body>
    <h2>Home</h2>

    <form action="{{ route('storeTravel') }}" method="POST">
        @csrf

        <label for="">Origen:</label>
        <input type="text" name="origin" required>
        <br><br>

        <label for="">Destino:</label>
        <input type="text" name="destination" required>
        <br><br>

        <label for="">Fecha salida:</label>
        <input type="date" name="start_date" required>
        <br><br>

        <label for="">Fecha llegada:</label>
        <input type="date" name="end_date" required>
        <br><br>

        <label for="">Precio:</label>
        <input type="number" name="price" required>
        <br><br>


        <label for="">Tipo:</label>
            <select name="type" multiple required>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
        </select>

        <br><br>

        <label for="">Trabajadores:</label>
            <select name="worker_ids[]" multiple required>
                @foreach ($workers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
        </select>


        <br><br>

    </form>


    <h3>Lista de viajes</h3>


        @foreach($travels  as $travel)

            <p><strong>Viaje {{$travel->id}}</strong></p>
            <p>Origen: {{$travel->origin}}</p>
            <p>Destino: {{$travel->destination}}</p>  
            <p>Precio: {{$travel->price}}</p>


            <form action="{{ route('travelE', $travel->id) }}" method="GET">
                <button type="submit">Actualizar viaje</button>
            </form>


            <form action="{{ route('deleteTravel', $travel->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar viaje</button>
            </form>


            


        @endforeach





</body>
</html>





  

</body>
</html>