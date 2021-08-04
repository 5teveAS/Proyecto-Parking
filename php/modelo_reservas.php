<?php
$conn =  mysqli_connect('localhost', 'root', '', 'parqueo');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <div class="tablaDeEspacios">
            <tr>
                <td>Numero de lugar</td>
                <td>Piso</td>
                <td>Tipo de Lugar</td>
                <td>Estado</td>

            </tr>

            <?php
            $sql = "SELECT * FROM estacionamiento";
            $result = mysqli_query($conn, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_lugar'] ?></td>
                    <td><?php echo $mostrar['piso'] ?></td>
                    <td><?php echo $mostrar['tipoLugar'] ?></td>
                    <td><?php echo $mostrar['estado'] ?></td>
                </tr>
            <?php
            }
            ?>



    </table>
    </div>
    <div class="tablaDeIngresoDatos">
        <form>
            <input type="text" name="ced_id">
            <input type="text" name="placa">
            <input type="text" name="nombre">
            <input type="text" name="apellido1">
            <input type="text" name="telefono">
            <input type="datetime" name="horaEntrada">
            <input type="datetime" name="horaSalida">
            <input type="number" name="id_lugar">
            <input type="submit" name="" value="Ingresar">
            <a href="index.html">Regresar</a>

        </form>

    </div>

</body>

</html>