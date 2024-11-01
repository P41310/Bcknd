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

    $id=$_GET['id'];

    /*Se realizar un consulta SQL , para actualizar un registro en una tabla
        la sintaxis es la misma sintaxis que se usa en sql server para actualizar un registro en una tabla
    */
    $sql="UPDATE backend SET  estado=1 WHERE idLinea ='$id'";
    
    /**mandamos la consulta  y la conexion para realizar dicha actualizacion
         * Aqui recien se realiza la actualizacion de datos, en la linea anterior solo
         * es una cadena tomando la sintaxis de una consulta SQL
    */
    $query= mysqli_query($conexion,$sql);
    
    
    if($query) $msj="Se cambio de estado exitosamente";/*Si la actualizacion se realizo con existo */
    else $msj="Error al modificar estado";/*Si la actualizacion NO se realizo con existo */
    
    /*Mostramos un mensaje y luego se redirige a la pagina index.php */
    echo "<script>
            alert('$msj');
            window.location= 'index.php'
        </script>";
?>