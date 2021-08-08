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
            <label>Cedula</label><br>
            <input type="text" name="ced_id"><br><br>
            <label>Placa</label><br>
            <input type="text" name="placa"><br><br>
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br><br>
            <label>Apellido</label><br>
            <input type="text" name="apellido1"><br><br>
            <label>Telefono</label><br>
            <input type="text" name="telefono"><br><br>
            <label>Hora de entrada</label><br>
            <input type="datetime-local" name="horaEntrada"><br><br>
            <label>Hora de salida</label><br>
            <input type="datetime-local" name="horaSalida"><br><br>
            <label>Numero de lugar</label><br>
            <input type="number" name="id_lugar"><br><br>
            <input type="submit" name="ingresar" value="Ingresar"><br><br>
            <a href="../index.html">Regresar</a>

        </form>

    </div>
    <?php

    $consultaEstado = "SELECT estado from estacionamiento where id_lugar='" . $id_lugar . "';";
    if (isset($_GET['ingresar'])) {
        $ced = $_GET['ced_id'];
        $placa = $_GET['placa'];
        $nombre = $_GET['nombre'];
        $apellido1 = $_GET['apellido1'];
        $telefono = $_GET['telefono'];
        $horaEntrada = $_GET['horaEntrada'];
        $horaSalida = $_GET['horaSalida'];
        $id_lugar = $_GET['id_lugar'];
        $nuevoEstado = "Ocupado";

        $resultadoQ = mysqli_query($conn, $consultaEstado);
        if ($ced != null || $placa != null || $nombre != null) {
            $Reserva = "INSERT INTO infotiquet(ced_id,placa,nombre,apellido1,telefono,horaEntrada,horaSalida,id_lugar) 
        VALUES('" . $ced . "','" . $placa . "','" . $nombre . "','" . $apellido1 . "','" . $telefono . "','" . $horaEntrada . "','" . $horaSalida . "','" . $id_lugar . "')";
            mysqli_query($conn, $Reserva);
            $updateEstacionamiento = "UPDATE estacionamiento
        SET estado = '" . $nuevoEstado . "'
        WHERE id_lugar = '" . $id_lugar . "';";
            mysqli_query($conn, $updateEstacionamiento);
        }
    }

    ?>

</body>

</html>