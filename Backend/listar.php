<?php
    /*Nombre del servidor, por defecto es localhost cuando se trabaja de forma local*/
    $servidor="localhost";
    /*Nombre deeñ usuario, por fecto es root cuando se trabaj de forma local*/
    $nombre="root";
    /*contraseña, por defecto es vacio*/
    $pass="";
    /*Nombre de la base de datos con el cual se quiere trabajar*/
    $nombreBD="smt";

    /*Realizamos la conexion con los datos requeridos, servidor, usuario, contraseña y base de datos*/
    $conexion = new mysqli($servidor,$nombre,$pass,$nombreBD);

    //obtener la fecha y hora actual del sistema
    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date("Y-m-d");
    $horaActual = date("H:i");
     // Convertir las horas de referencia a formato timestamp
    $hora1 = strtotime("14:30");
    $hora2 = strtotime("22:30");
    $hora3 = strtotime("06:30");


    if (strtotime($horaActual) >= $hora3 && strtotime($horaActual) < $hora1) {
        $horaInicio="06:30";
        $horaFin="14:30";
    } elseif (strtotime($horaActual) >= $hora1 && strtotime($horaActual) < $hora2) {
        $horaInicio="14:30";
        $horaFin="22:30";
    } else{
        $horaInicio="22:30";
        $horaFin="06:30";
    }

    $sql= "SELECT * FROM horario2 WHERE fecha='$fechaActual' AND horInicio='$horaInicio' AND horaFin=' $horaFin'";
    $result=mysqli_query($conexion,$sql);
    
    $numRows = mysqli_num_rows($result);
    if($numRows!=0){
        $row = mysqli_fetch_assoc($result);
        $idHorario=$row["idHorario"];
    }else{
        $idHorario=-1;
    }     
    
    /*Se realizar un consulta SQL , seleccionar todos los elementos y ordenarlos de forma descendente por el campo idLinea */
    $sql="SELECT *  FROM Backend WHERE idHorario=$idHorario ORDER BY IdLinea DESC";
    $query=mysqli_query(mysql: $conexion,query: $sql);
    mysqli_close(mysql: $conexion);
?>