<?php
    
    /*Nombre del servidor, por defecto es localhost cuando se trabaja de forma local*/
    $servidor="localhost";
    /*Nombre deeñ usuario, por fecto es root cuando se trabaj de forma local*/
    $nombre="root";
    /*contraseña, por defecto es vacio*/
    $pass="";
    /*Nombre de la base de datos con el cual se quiere trabajar  $nombreBD="pal";*/
    
    $nombreBD="smt";
    /*Realizamos la conexion con los datos requeridos, servidor, usuario, contraseña y base de datos*/
    $conexion = new mysqli($servidor,$nombre,$pass,$nombreBD);

    /*Obtener el valor ingresado en el campo turno que se envio por la url el valor */
   
    /*Obtener el valor ingresado en el campo linea que se envio por la url el valor 
    $buscarLinea=$_GET['buscarLinea'];*/
    /*Obtener el valor ingresado en el campo fecha que se envio por la url el valor */
    $buscarFechaInicio=$_GET['buscarFechaInicio'];
    $buscarFechaFin=$_GET['buscarFechaFin'];
    $buscarTurno=$_GET['buscarTurno'];
    
    /*
    Se realizar uma consulta de busqueda con la clausula where que es como una condicion
    se esta realizadno la busqueda al campo fecha, turno, linea  tomando como valores obtenidos por la url.
    
    and linea like '%".$buscarLinea."%'
    */
    
    $sql="SELECT *  FROM smt WHERE fecha BETWEEN '$buscarFechaInicio' AND '$buscarFechaFin'  and turno like '%".$buscarTurno."%' ORDER BY estado DESC";//.

    /*Se manda la consulta y la conexion para obtener los registros solicitados */
    $query=mysqli_query($conexion,$sql);

    $datos=[];//se crea un array
    while($row=mysqli_fetch_array($query)){
        array_push($datos,$row);//se almacena en el array los registros que coinciden con la busqueda
    }

    /*mandamos en formato json el array para que sea leido en el javascript en el ajax*/
    echo json_encode($datos)
?>