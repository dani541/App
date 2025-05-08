<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h3>Editar Viaje</h3>


<form action="{{route('editTravel',$travel->id)}}" method="post">
    @csrf

    <label for="">Origen:</label>
    <input type="text" name='origin' value='{{$travel->origin}}'>

    <br><br>

    <label for="">Destino:</label>
    <input type="text" name='destination' value='{{$travel->destination}}'>

    <br><br>

    <label for="">Fecha salida:</label>
    <input type="text" name='departDate' value='{{$travel->departDate}}'>

    <br><br>

    <label for="">Fecha entrada:</label>
    <input type="text" name='returnDate' value='{{$travel->returnDate}}'>

    <br><br>

    <label for="">Precio:</label>
    <input type="number" name='price' value='{{$travel->price}}'>

    <br><br>


    <input type="submit" value='Actualizar'>

</form>

<!--pREGUNTAR LO DE LO BORRA TODOD LOS TRABAJADORES-->

        <form action="{{ route('deleteTravel', $travel->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este viaje?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red;">Eliminar</button>
        </form>
</body>
</html>