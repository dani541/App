<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h3>Crear trabajador</h3>


        <form action="{{ route('storeWorker') }}" method="POST">
        @csrf

            <label for="">Nombre:</label>
            <input type="text" name='name'>

                <br>
                <br>

            <label for="">Email:</label>
            <input type="text" name='email'>

                <br>
                <br>

            <label for="">Teléfono:</label>
            <input type="text" name='phone'>

                <br>
                <br>

            
             


            <input type="submit" value="Crear nuevo trabajador/a">



        </form>





</body>
</html>