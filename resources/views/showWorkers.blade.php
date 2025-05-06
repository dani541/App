<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

        <h3>Trabajadores</h3>

        @foreach($workers as $worker)

            <p>Nombre: {{$worker->name}}</p>
            <p>Email: {{$worker->email}}</p>
            <p>Teléfono: {{$worker->phone}}</p>


        
        <hr>


        @endforeach

        <form action="{{route('createW')}}">
            <input type="submit" value="Crear nuevo trabajador/a">
        </form>


</body>
</html>
