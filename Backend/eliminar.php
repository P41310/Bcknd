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

/*EN este caso estamos obteniendo un valor de la variable id enviado desde la URL
si revisa su archivo index.php en la tabla donde muestra todos sus registros
cada registro tieen su boton editar, 
este boton ediar tiene una url: a que arhivo se va dirigir y asignado un variable id donde se 
envia el valor de idLinea 

este elemento esta en su arhivo index.php
href="editar.php?id=<?php echo $row['idLinea'] ?>
href: indica a que pagina se va a redireccionar y despues viene un signo de interrogacion ?
a partir de hay se peude indicar las variables que se van enviar por la url
en este ejemplo solo se esta enviando una variable con nombre id y toma el valor de idLinea
<a href="editar.php?id=<?php echo $row['idLinea'] ?>" class="btn btn-info">Editar</a>
*/
$idLinea=$_GET['id'];

/*Se realizar un consulta SQL , para eliminar un registro de la tabla
    la sintaxis es la misma sintaxis que se usa en sql server para eliminar un registro  en una tabla
*/
$sql="DELETE FROM backend  WHERE idLinea='$idLinea'";

/**Se realiza la consulta */
$query=mysqli_query($conexion,$sql);

    /*Si no se quiere mostrar un mensaje en un alerta se puede usar este codigo comentado
    que lo q hace es enviarnos a la pagina con nombre index.php */
    /*if($query){
        Header("Location: index.php");
    }*/

    /*Mostramos un mensaje y luego nos dirigimos a la pagina con nombre index.php */
    if($query){
        echo "<script>
                alert('Registro eliminado');
                window.location= 'index.php'
        </script>"; 
    }
?>
