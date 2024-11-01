<?php
    /**El try{}catch(Exception $e) se usa para capturar errores en tiempo de ejecucion */
    try{

        
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


        $sql="SELECT MAX(fecha) AS max_fecha, MAX(horInicio) AS max_hora_inicio, MAX(horaFin) AS max_horaFin FROM horario2";//.

        /*Se manda la consulta y la conexion para obtener los registros solicitados */
        $result=mysqli_query($conexion,$sql);
        $idHorario="";

        if($result){
            $row = mysqli_fetch_assoc($result);
            $maxFecha = $row["max_fecha"];
            $maxHoraInicio = $row["max_hora_inicio"];
            $maxHoraFin = $row["max_horaFin"];

            //crear una nuevo registro en la tabla horario
            //obtener la fecha y hora actual del sistema
            date_default_timezone_set("America/Mexico_City");
            $fechaActual = date("Y-m-d");
            $horaActual = date("H:i");
            $fechaHoraActual = $fechaActual . " " . $horaActual;
            // Convertir las horas de referencia a formato timestamp
            $hora1 = strtotime("14:30");
            $hora2 = strtotime("22:30");
            $hora3 = strtotime("06:30");

            if($maxFecha!=NULL){#se tiene ya creado un horario
                if(strtotime($fechaHoraActual) > strtotime($maxFecha . " " . $maxHoraFin)){
                    if (strtotime($horaActual) >= $hora3 && strtotime($horaActual) < $hora1) {
                        $horaInicio="06:30";
                        $horaFin="14:30";
                    } elseif (strtotime($horaActual) >= $hora1 && strtotime($horaActual) < $hora2) {
                        $horaInicio="14:30";
                        $horaFin="22:30";
                    } else{
                        $fechaActual = date("Y-m-d", strtotime($fechaActual . " -1 day"));
                        $horaInicio="22:30";
                        $horaFin="06:30";
                    }
    
                    $sql= "INSERT INTO horario2(fecha,horInicio,horaFin) VALUES ('$fechaActual','$horaInicio','$horaFin')";
                    $query= mysqli_query($conexion,$sql);
                    // Obtener el ID del último registro insertado
                    $idHorario = mysqli_insert_id($conexion);
                    //mysqli_close($conexion);           
                }
            }else{#no hay fechas registradas
                // Comparar la hora actual con las horas de referencia
                #registrar la fecha y hora segun el turno
                #primer turno: 06:30 - 14:30
                #segundo turno: 14:30 - 22:30
                #tercer turno: 22-30 - 06:30
                if (strtotime($horaActual) >= $hora3 && strtotime($horaActual) < $hora1) {
                    $horaInicio="06:30";
                    $horaFin="14:30";
                } elseif (strtotime($horaActual) >= $hora1 && strtotime($horaActual) < $hora2) {
                    $horaInicio="14:30";
                    $horaFin="22:30";
                } else{
                    $fechaActual = date("Y-m-d", strtotime($fechaActual . " -1 day"));
                    $horaInicio="22:30";
                    $horaFin="06:30";
                }

                $sql= "INSERT INTO horario2(fecha,horInicio,horaFin) VALUES ('$fechaActual','$horaInicio','$horaFin')";
                $query= mysqli_query($conexion,$sql);
                // Obtener el ID del último registro insertado
                $idHorario = mysqli_insert_id($conexion);
                //mysqli_close($conexion);
            } 
            
        }else{
            echo "Error en la consulta";
        }

        
        //------------------------------------------------------------
        /*Obtenemos los datos que se enviaron desde el fomulario, usando 
        la variable global POST.
        se enviaron los datos desde el archivo index.php, gracias a la propiedad: name
        de cada elemento
        el valor que va dentro de la variable global POST es el nombre del name
        asignadoa un elemento en el archivo index.php, recoerdando que desde archvo
        se envio el formulario usando el metodo POST, es por eso que se usa el $POST,
        si el metodo hubiera sigo GET, entonces se usaba la variable global $GET
        */
        
        //--------------------------------------------------------------------------------
        //--------------------------------------------------------------------------------
        /*obtenemos en valor que hayamos seleccionado en este select, como se nota
        este elemento tiene el atributo name="turno" , entonces al escribir $_POST['turno'];
        estamos rescatando el valor que se selecciono en este select y lo guardamos en un variable
        $turno

        Este elemento esta ubicado en el archivo index.php
        <div>
            <h5>Turno</h5>
            <select id="turno" name="turno">
                <option value="turno1">1</option>
                <option value="turno2">2</option>
                <option value="turno3">3</option>
            </select>
        </div>
        */

        $IdLinea=$_POST['IdLinea'];

        if($idHorario==""){
            $idHorario=$_POST['idHorario'];
        }


        /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="fecha" el valor de ese elemento se está obteniendo
        */
        $fecha=$_POST['fecha'];



        $turno=$_POST['turno'];


         /*El mismo procedimiento, revise su archvo index.php, vera que un 
        elemento tiene asignado name="linea" el valor de ese elemento se está obteniendo
        */
        $empleado=$_POST['empleado'];

        /*Asi sucede con el resto de elementos, 
        $_POST['hora'];, rescatamos el valor que viajo en la propiedad name="hora",
        si revisa su arvhivo index.php , vera que un elemento tiene la propiedad
        name="hora", ese valor viaja y lo recuperamos con el $_POST y lo guardmaos en una variable
        */
        $hora=$_POST['hora'];

           
       
        /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="comcode" el valor de ese elemento se está obteniendo
        */
        $comcode=$_POST['comcode'];

        /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="modelo" el valor de ese elemento se está obteniendo
        */
        $modelo=$_POST['modelo'];

       

        /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="cantidad" el valor de ese elemento se está obteniendo
        */
        $cantidad=$_POST['cantidad'];

         /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="rate" el valor de ese elemento se está obteniendo
        */
        $ProcRe=$_POST['ProcRe'];

        /*El mismo procedimiento, revise su archvo index.php, vera que un elemento tiene 
        asignado name="eficiencia" el valor de ese elemento se está obteniendo
        */
        $MatPara=$_POST['MatPara'];

        /*Se realizar un consulta SQL , para insertar un registro en una tabla
        la sintaxis es la misma sintaxis que se usa en sql server para ingresar un registro en una tabla
        */
        $sql="INSERT INTO backend(idHorario,fecha,turno,empleado,hora,comcode,modelo,cantidad,ProcRe,MatPara,estado) VALUES('$idHorario','$fecha','$turno','$empleado','$hora','$comcode','$modelo','$cantidad','$ProcRe', '$MatPara', 0)";
        /**mandamos la consulta  y la conexion para realizar dicha insercion
         * Aqui recien se realiza la insercion de datos, en la linea anterior solo
         * es una cadena tomando la sintaxis de una consulta SQL
        */
        $query= mysqli_query($conexion,$sql);
    
        
        if($query) $msj="Se realizó un nuevo registro";/*Si la insercion se realizo con exito */
        else $msj="Error al realizar nuevo registro";/*Si la insercion NO se realizo con exito */
    
        /*Se va mostrar un alert mostrando un mensaje si se realizo el registro o no se realizo el registro */
        /*alert('$msj'); mosntrando mensaje en un aelrt */
        /*window.location= 'index.php' indicamos que queremos ir al archivo index.php */
        echo "<script>
                    alert('$msj');
                    window.location= 'index.php'
            </script>"; 
    }catch(Exception){/*Mostrar un mensaje en caso de un error al momento de ingresar un registro */
        echo "<script>
                alert('Error inesperado, intente nuevamente');
                window.location= 'index.php'
        </script>"; 
    }

?>