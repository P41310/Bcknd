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

    /*Se realizar un consulta SQL , para realizar una busqueda en una tabla
    la sintaxis es la misma sintaxis que se usa en sql server para realizar una consulta en una tabla
    */
    $sql="SELECT * FROM backend WHERE idLinea='$id'";
    /**mandamos la consulta  y la conexion para realizar dicha actualizacion
         * Aqui recien se realiza la actualizacion de datos, en la linea anterior solo
         * es una cadena tomando la sintaxis de una consulta SQL
    */
    $query=mysqli_query($conexion,$sql);

    /**Retorna un array que corresponde a la fila obtenida por la consulta
     * y lo guardamos en una variable de nombre $row, esta variable row
     * 
     */
    $row=mysqli_fetch_array($query);
    
   
   
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--TITULO DE LA PAGINA-->
        <title>Modificar</title>

        <!--INDEXANDO UN ARCHIVO DE TIPO CSS PARA DAR ESTILO A LA PAGINA-->
        <link rel="stylesheet"  href="css/bootstrap.css">

        <!--agregando un icon para la pagina web-->
        <link rel="shortcut icon" href="img/ABB.png">

        <!--INDEXANDO dos archivos de tipo javascript para sarle funcionalidad a la página-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/crud.js"></script>
    </head>

<body>
   


<div class="container mb-2">
    
<form action="./actualizar.php" method="POST">
        <!--h1: representa un titulo en la pagina web-->
        <h1>Registro de Produccion Backend SMT</h1>
        <h2> == PAGINA EN CONSTRUCCION == </H2> 
        
        <div class="row">   
        <input type="hidden" name="idLinea" value="<?php echo $idLinea ?>">   
    <input type="hidden" name="idHorario" value="<?php echo $idHorario ?>">
        
       

<!--select: es para agrupar un conjunto de opciones a elegir,-->



            
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Fecha</label>
                <!--Creando un elemento de tipo fecha, con este elemento se podrá seleccionar
                        una fecha-->
                
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="date" name="fecha" value="<?php echo $row['fecha']  ?>">
                </input>
            </div>
           



            <div class="col-md-3 col-sm-12 mb-3">
                <label>Turno</label>
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="turno" id="turno"value="<?php echo $row['turno']  ?>">
                
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Empleado</label>
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="empleado" id="empleado" value="<?php echo $row['empleado']  ?>" >
            </div>
        
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Hora</label>
                
                <input class="form-control border border-dark border-2 rounded-0 input-height" type='text' id='hora' name='hora' value="<?php echo $row['hora']  ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Comcode</label>
             <input type='text'  class="form-control border border-dark border-2 rounded-0 input-height" onchange='cambioOpciones();' id='comcode' name='comcode' value="<?php echo $row['comcode']  ?>" >
        
             </div>

            
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Modelo</label>
                <!--input tipo text, sirve para ingresar un valor y luego poder usarlo en javascript o enviarlo al servidor-->
            <input type='text'  class="form-control border border-dark border-2 rounded-0 input-height" onchange='cambioOpciones();' id='modelo' name='modelo' value="<?php echo $row['modelo']  ?>">
                
            </div>

          

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Cantidad</label>
                    <input class="form-control border border-dark border-2 rounded-0 input-height" type='text' name='cantidad' />
            </div>



                            <div class="col-md-3 col-sm-12 mb-3">
                                <label>Proceso Realizado</label>
                                <!--<input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id='rate' readonly="readonly" name='rate' />-->
                                <select class="form-control border border-dark border-2 rounded-0 input-height" id="ProcRe" name="ProcRe" value="<?php echo $row['ProcRe']  ?>">
                                    <!-- Un select pueden tener uno o mas opciones-->
                                    <!--option es un elemento que forma parte de un select-->
                                    <!--El value indica el valor que contiene un option-->
                                    <option value=""></option>
                                    <option value="Quimico">Quimico</option>
                                    <option value="Router">Router</option>
                                    <option value="Programacion">Programacion</option>
                                    <option value="Programacion2">Programacion2</option>
                                    <option value="InCircuit">InCircuit</option>
                                    <option value="Retrabajo">Retrabajo</option>
                                    <option value="Foam">Foam</option>
                                </select><!--cierre del select-->
                            </div>


                            

                            <div class="col-md-3 col-sm-12 mb-3">
                                <label>Material Para:</label>
                                <!--<input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id="sum" name='eficiencia' readonly="readonly" onchange="cal()" onkeyup="cal()" />-->
                                    <select class="form-control border border-dark border-2 rounded-0 input-height" id="MatPara" name="MatPara">
                                    <!-- Un select pueden tener uno o mas opciones-->
                                    <!--option es un elemento que forma parte de un select-->
                                    <!--El value indica el valor que contiene un option-->
                                    <option value=""></option>
                                    <option value="Linea">Linea</option><!--Ejm: option tiene el valor de PAL0-->
                                    <option value="Quimico">Quimico</option>
                                    <option value="Router">Router</option>
                                    <option value="Programacion">Programacion</option>
                                    <option value="Programacion2">Programacion2</option>
                                    <option value="InCircuit">InCircuit</option>
                                    <option value="Retrabajo">Retrabajo</option>
                                    <option value="Foam">Foam</option>
                                </select><!--cierre del select-->
                            </div>

                           
                

                            <div class="operaciones">
                              <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                            </div>  
     

                    
                            <div>
                            <img class="imglogo" src="img/LogOmniOn.png" alt="OmniOnPower" width="150px"></img>
                            </div>


                    
    
          
             
    </form><!--cierre del form-->
    
    </div>
    </body>
  
</html>