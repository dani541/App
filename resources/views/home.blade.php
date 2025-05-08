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

    <label for="origin">Origen:</label>
    <input type="text" name="origin" id="origin" required>
    <br><br>

    <label for="destination">Destino:</label>
    <input type="text" name="destination" id="destination" required>
    <br><br>

    <label for="departDate">Fecha salida:</label>
    <input type="date" name="departDate" id="departDate" required>
    <br><br>

    <label for="returnDate">Fecha llegada:</label>
    <input type="date" name="returnDate" id="returnDate" required>
    <br><br>

    <label for="price">Precio:</label>
    <input type="number" name="price" id="price" required>
    <br><br>

    <label for="type_id">Tipo:</label>
    <select name="type_id" id="type_id" required>
        @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>
    <br><br>

    <label for="workers">Trabajadores:</label>
    <select name="workers[]" id="workers" multiple required>
        @foreach ($workers as $worker)
            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Crear viaje</button>
</form>



    <h2>Lista de viajes</h3>


        @foreach($travels  as $travel)

            <p><strong>Viaje {{$travel->id}}</strong></p>
            <p>Origen: {{$travel->origin}}</p>
            <p>Destino: {{$travel->destination}}</p>  
            <p>Precio: {{$travel->price}}</p>

            <p>Tipo: {{ $travel->type->name }}</p>  <!-- preguntar -->

            <br>
            <h4>Trabajador@s </h3>
            @foreach($travel->workers as $worker)

                <p>Nombre:{{$worker->name}}</p>
                <p>Nombre:{{$worker->email}}</p>
                <p>Nombre:{{$worker->phone}}</p>

            @endforeach
            
            <br>
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