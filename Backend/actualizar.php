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

    /**Estas lineas de codigo esta indicado en el archivo insertar.php */
    $idLinea=$_POST['idLinea'];
    $fecha=$_POST['fecha'];
    $turno=$_POST['turno'];
    $empleado=$_POST['empleado'];
    $hora=$_POST['hora'];
    $comcode=$_POST['comcode'];
    $modelo=$_POST['modelo'];
    $cantidad=$_POST['cantidad'];
    $ProcRe=$_POST['ProcRe'];
    $MatPara=$_POST['MatPara'];

    /*Se realizar un consulta SQL , para actualizar un registro en una tabla
        la sintaxis es la misma sintaxis que se usa en sql server para actualizar un registro en una tabla
    */
    $sql="UPDATE backend SET  fecha='$fecha',turno='$turno', empleado='$empleado', hora='$hora', comcode='$comcode',modelo='$modelo',
    cantidad='$cantidad', ProcRe='$ProcRe', MatPara='$MatPara' WHERE idLinea ='$idLinea'";
    
    /**mandamos la consulta  y la conexion para realizar dicha actualizacion
         * Aqui recien se realiza la actualizacion de datos, en la linea anterior solo
         * es una cadena tomando la sintaxis de una consulta SQL
    */
    $query= mysqli_query($conexion,$sql);
    
    
    if($query) $msj="Se modifificó registro";/*Si la actualizacion se realizo con existo */
    else $msj="Error al modificar registro";/*Si la actualizacion NO se realizo con existo */
    
    /*Mostramos un mensaje y luego se redirige a la pagina index.php */
    echo "<script>
            alert('$msj');
            window.location= 'index.php'
        </script>";
?>