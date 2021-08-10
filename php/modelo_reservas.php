<?php
$conn =  mysqli_connect('localhost', 'root', '', 'parqueo');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/1ec324e24e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/reservas.css">
    <title>Reservar Espacios</title>
</head>

<body>
    <header class="header">
        <div class="centrarContenido contenido">
            <h1><i class="fas fa-car-side"></i> Parking SJO</h1>

            <nav class="menu">
                <a href="../index.html">Log Out</a>
            </nav>
        </div>
    </header>
    <div class="contenedor centrarContenido">


        <div class="tablaDeIngresoDatos centrarContenido">
            <h2 id="tituloReserva">¡Para reservar un espacio, ingresa tus datos!</h2>
            <form class="formularioReserva">
                <div class="campo">
                <label for="cedula">Cédula</label>
                <input 
                    type="text"
                    id="cedula"
                    name="ced_id"
                    placeholder="Tu Cédula" 
                    required>
                </div>
                <div class="campo">
                <label for="placa">Placa</label>
                <input 
                    type="text" 
                    id="placa"
                    name="placa" 
                    placeholder="Tu Número de Placa"
                    required>
                </div>
                <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                    type="text" 
                    id="nombre"
                    name="nombre"
                    placeholder="Tu Nombre" 
                    required>
                </div>
                <div class="campo">
                <label for="apellido">Apellido</label>
                <input 
                    type="text" 
                    id="apellido"
                    name="apellido1"
                    placeholder="Tu Apellido" 
                    required>
                </div>
                <div class="campo">
                <label for="telefono">Teléfono</label>
                <input 
                    type="text" 
                    id="telefono"
                    name="telefono" 
                    placeholder="Tu Número de Teléfono"
                    required>
                </div>
                <div class="campo">
                <label for="horaE">Hora de entrada</label>
                <input 
                    type="datetime-local" 
                    id="horaE"
                    name="horaEntrada" 
                    placeholder="Hora de entrada"
                    required>
                </div>

                <div class="campo">
                <label >Hora de salida</label>
                <input 
                    type="datetime-local" 
                    name="horaSalida" 
                    placeholder="Hora de salida"
                    required>
                </div>

                
                <div class="campo">
                <label for="lugar">Numero de lugar</label>
                <input 
                    type="number" 
                    id="lugar"
                    name="id_lugar" 
                    placeholder="Ingresa el Número de Lugar"
                    min="1" 
                    max="20"
                    required>
                </div>

                <div>
                <button 
                    id="boton"
                    type="submit" 
                    name="ingresar">Reservar</button>
                </div>

            </form>
        </div>
        <?php


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

        <div class="centrarContenido">
            <h2 id="tituloEspacios">Lugares disponibles a elegir!</h2>
            <table class="centrarContenido tablaEspacios">
                <div class="tablaDeEspacios">
                    <tr>
                        <td class="td">Numero de lugar</td>
                        <td>Piso</td>
                        <td>Tipo de Lugar</td>
                        <td id="estado">Estado</td>

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
                </div>
            </table>

        </div>
    </div>
    
    <script src="../js/reserva.js"></script>
</body>

</html>