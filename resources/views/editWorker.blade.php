<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h3>Editar trabajador</h3>


        <form action="{{route('editWorker',$worker->id)}}" method="post">
            @csrf

            <label for="">Nombre:</label>
            <input type="text" name='name' value='{{$worker->name}}'>

            <br><br>

            <label for="">Email:</label>
            <input type="text" name='email' value='{{$worker->email}}'>

            <br><br>

            <label for="">Teléfono:</label>
            <input type="text" name='phone' value='{{$worker->phone}}'>

            <br><br>


            <input type="submit" value='Actualizar'>

        </form>



</body>
</html>