<?php
include("listar.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--TITULO DE LA PAGINA-->
    <title>SMT (PabloGG)</title>

    <!--INDEXANDO UN ARCHIVO DE TIPO CSS PARA DAR ESTILO A LA PAGINA-->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!--agregando un icono para la pagina web-->
    <link rel="shortcut icon" href="img/ABB.png">

    <!--INDEXANDO dos archivos de tipo javascript para darle funcionalidad a la página-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
    <script type="text/javascript" src="js/iconos.js"></script>
</head>
<!--form: la etiqueta form sirve para enviar un conjunto de datos desde la pagina web
    al servidor,
        method: sirve para indicar a la pagina de que forma se va enviar los datos: existen varios
        entre los mas usados POST y GET
        action: indica a que archivo de tipo php viajara los datos ingresados en el formulario

    -->
<style>
    .pintar {
        background-color: #88DC65;
    }
</style>

<body>


    <div class="container mb-6">
        
        <form name="f" action="./insertar.php" method="POST">
            <!--h1: representa un titulo en la pagina web-->
            <h1>Registro de Produccion Backend SMT</h1>
            
            
        <input type="hidden" name="idHorario" value="<?php echo $idHorario ?>">
            
           

<!--select: es para agrupar un conjunto de opciones a elegir,-->


</div>
            <div class="row">
                <div class="col-md-2 col-sm-12 mb-2">
                    <label>Fecha</label>
                    <!--Creando un elemento de tipo fecha, con este elemento se podrá seleccionar
                            una fecha-->
                    <input class="form-control border border-dark border-2 rounded-0 input-height" type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </input>
                </div>

                <div class="col-md-2 col-sm-12 mb-2">
                    <label>Turno</label>
                    <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="turno" id="turno">
                </div>

                <div class="col-md-2 col-sm-12 mb-2">
                    <label>Empleado</label>
                    <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="empleado" id="empleado">
                </div>

                <div class="col-md-2 col-sm-12 mb-2">
                    <label>Hora</label>
                    <input class="form-control border border-dark border-2 rounded-0 input-height" type="time" name="hora" id="hora">
                </div>
                
                <div class="col-md-4 col-sm-12 mb-4">
                    <label>Comcode</label>
                    <select id='opciones' onchange='cambioOpciones();' class="form-select border border-dark border-2 rounded-0 input-height" name="comcode">
                        <option value='0'>Selecciona Comcode</option>
                        <option value='7000159880A'>7000159880A</option>
                        <option value='150023373'> 150023373</option>
                        <option value='150031303'> 150031303</option>
                        <option value='150021625'> 150021625</option>
                        <option value='150023373'> 150023373</option>
                        <option value='150021625'> 150021625</option>
                        <option value='150034771'> 150034771</option>
                        <option value='7000096522A'> 7000096522A</option>
                        <option value='7000377205A'> 7000377205A</option>
                        <option value='7000203817A'> 7000203817A</option>
                        <option value='7000365278A'> 7000365278A</option>
                        <option value='150052989'> 150052989</option>
                        <option value='7000307210A'> 7000307210A</option>
                        <option value='150052814_GP100'> 150052814_GP100</option>
                        <option value='150053157'> 150053157</option>
                        <option value='1600311320A'> 1600311320A</option>
                        <option value='7000261601A'> 7000261601A</option>
                                                
                    </select>
                </div>
            
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 mb-3">
                    <label>Modelo</label>
                    <!--input tipo text, sirve para ingresar un valor y luego poder usarlo en javascript o enviarlo al servidor-->
                    <input type='text'  class="form-control border border-dark border-2 rounded-0 input-height" onchange='cambioOpciones();' id='modelo' name='modelo'  />
                </div>

                <div class="col-md-3 col-sm-12 mb-3">
                    <label>Cantidad</label>
                    <input type='number' class="form-control border border-dark border-2 rounded-0 input-height" id='cantidad' name='cantidad' onchange="cal()" onkeyup="cal()" />
                </div>

                <div class="col-md-3 col-sm-12 mb-3">
                    <label>Proceso Realizado</label>
                    <!--<input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id='rate' readonly="readonly" name='rate' />-->
                    <select class="form-control border border-dark border-2 rounded-0 input-height" id="ProcRe" name="ProcRe">
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
            </div>


            <div class="operaciones">
                <!--Creando un elemento de tipo boton-->
                <!--submit: indica que el boton cuando este 
                    es presionado, envía el formulario al que pertenece.-->
                <input type="submit" value="Registrar" class="btn btn-info">

            </div>
            <img class="imglogo" src="img/LogOmniOn.png" alt="OmniOnPower" width="150px"></img>
        </form><!--cierre del form-->

    

        <div class="row">
            <div class="col-md-2 col-sm-12 mb-2">
                <label> Fecha Inicio</label>
                <input type="date" class="form-control border border-dark border-2 rounded-0 input-height" id="buscarFechaInicio" name="buscarFechaInicio" />
                
            </div>

            <div class="col-md-2 col-sm-12 mb-2">
                <label>Fecha Fin</label>
                <input type="date" class="form-control border border-dark border-2 rounded-0 input-height" id="buscarFechaFin" name="buscarFechaFin" />
            </div>

            <div class="col-md-2 col-sm-12 mb-2">
                <label>Turno</label>
                <input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id='buscarTurno' name='buscarTurno' />
            </div>

           <!-- <div class="col-md-3 col-sm-12 mb-3">
                <label>Linea</label>
                <input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id='buscarLinea' name='buscarLinea'/>
            </div>-->
        </div>

        <button class="btn btn-primary" id="buscar">Buscar</button>
        <br/>
        <br/>

        <div class="table-responsive d-block" style="overflow-x: auto;">
        <table class="table table-bordered" cellspacing="0" rules="all" id="ContentPlaceHolder1_GridProduccion">
            <thead>
                <tr style="color:White;background-color:#3962d1;">
                    <th class="col-md-1" scope="col">ID</th>
                    <th class="col-md-1" scope="col">Fecha</th>
                    <th class="col-md-1" scope="col">Turno</th>
                    <th class="col-md-1" scope="col">Empleado</th>
                    <th class="col-md-1" scope="col">Hora</th>
                    <th class="col-md-1" scope="col">Comcode</th>
                    <th class="col-md-1" scope="col">Modelo</th>
                    <th class="col-md-1" scope="col">Cantidad</th>
                    <th class="col-md-1" scope="col">ProcesoRealizado</th>
                    <th class="col-md-1" scope="col">MaterialPara</th>
                    <th class="col-md-1" scope="col">Modif|Elim|Confr</th>            
                   
                </tr>
            </thead>
            <tbody id="detalle">
                <!--Para que se inserte los datos en la tabla, recorremos la matriz con nombre
                    $query en donde obtendremos las valores de cada posicion de un array
                    el while sirve para recorrer todas las filas y se generen una fila en la tabla
                    por cada registro.

                    En este apartado  para escribir un codigo php en html se insertar la siguiente 
                    sintaxis: <?php  //codigo 
                                ?> todo lo que vaye dentro  sera codigo php
                    y lo que este fuera sera codigo html
                    -->
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr <?php if ($row['estado'] == "1") echo 'class="pintar"'; ?>>
                        <!--La insercion de datos se hace a travez del metodo echo
                            este metodo lo que hace es imprimir el contenido y se pueda 
                            visualizar en pantalla
                            el contenido que va dentro de cada row hace referencia a las columnas
                            de la tabla de la base de datos
                            -->
                       <!-- <td><?php echo $row['idLinea'] ?></td>-->
                        <td><?php echo $row['idHorario'] ?>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['turno'] ?></td>
                        <td><?php echo $row['empleado'] ?></td>
                        <td><?php echo $row['hora'] ?></td>
                        <td><?php echo $row['comcode'] ?></td>
                        <td><?php echo $row['modelo'] ?></td>
                        <td><?php echo $row['cantidad'] ?></td>
                        <td><?php echo $row['ProcRe'] ?></td>
                        <td><?php echo $row['MatPara'] ?></td>

                        <td>
                            <a href="editar.php?id=<?php echo $row['idLinea'] ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                            <a href="eliminar.php?id=<?php echo $row['idLinea'] ?>" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash" style="color: #ffffff;"></i></a>
                            <a href="cambiarEstado.php?id=<?php echo $row['idLinea'] ?>" class="btn btn-info" onclick="return confirmarEliminar()"><i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i></a>
                        </td>
                    </tr>

                    <!--Se inserta nuevamente <?php  ?>, por que recordemos que en la linea
                        227 escribimos un while el cual abre la llaves  y en este apartado se esta cerrando
                        esas llaves
                    -->
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        
    </div>

    <script>z
        let buscarFechaInicio = document.getElementById("buscarFechaInicio"); //obtener el campo buscarFecha por medio del id buscarFecha
        let buscarFechaFin = document.getElementById("buscarFechaFin"); //obtener el campo buscarFecha por medio del id buscarFecha
        let buscarTurno = document.getElementById("buscarTurno"); //obtener el campo buscarTurno por medio del id buscarTurno
        let buscarLinea = document.getElementById("buscarLinea"); //obtener el campo buscarLinea por medio del id buscarLinea
        let buscarButton = document.getElementById("buscar");

        /**Se asigna un evento al boton buscar, cada vez que se le da click se activa este evento y se ejecuta su contenido */
        buscarButton.addEventListener("click", function() {
            mandarDatos();
        });

        /*metodo que se encarga de enviar los datos de turno, linea y fecha al archivo buscar.php enviando los valor por la url para eso se usa el metodo GET */
        /*Para esto se usa la tecnologia ajax, ajax ayuda a enviar datos desde la pagina al servidor, de forma que el servidor devulve una respuesta, y con el ajax no es necesario actualizar toda la
        pagina, solo una parte de la pagina en este caso solo actualiza la tabla , esto evita que se recargue toda la pagina y la pagina fluye de manera mas rapida */
        function mandarDatos() {
            $.ajax({
                type: 'GET', //metodo de envio get, el dato se envia por la url
                url: "buscar.php?buscarTurno=" + buscarTurno.value  + "&buscarFechaInicio=" + buscarFechaInicio.value + "&buscarFechaFin=" + buscarFechaFin.value, //usamos el archivo buscar.php enviando por la url el valor ingresao en el campo buscar
                data: {},
                success: function(data) { //si la consulta se realizo con exito
                    let datos = JSON.parse(data); //obtenemos el array enviado en formato JSON desde el archivo buscar.php 
                    //con un foreach recorremos el array datos donde esta almacenado los registros obtenidos desde buscar.php
                    let fila = "";
                    datos.forEach(dato => {
                        let classPintar = dato['estado'] == "1" ? 'pintar' : '';
                        //creamos una fila por cada registro, en la fila crea la etiqueta tr y los td que son etiquetas html, pero creados desde javascript
                        fila += `
                                <tr class="${classPintar}">
                                    <td>${dato["idLinea"]}</td>
                                    <td>${dato["idHorario"]}</td>
                                    <td>${dato["fecha"]}</td>
                                    <td>${dato["turno"]}</td>
                                    <td>${dato["empleado"]}</td>
                                    <td>${dato["hora"]}</td>
                                    <td>${dato["comcode"]}</td>
                                    <td>${dato["modelo"]}</td>
                                    <td>${dato["cantidad"]}</td>
                                    <td>${dato["ProcRe"]}</td>
                                    <td>${dato["MatPara"]}</td>
                                    <td>
                                        <a href="editar.php?id=${dato['idLinea']}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> </a>
                                        <a href="eliminar.php?id=${dato['idLinea']}" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                        <a href="cambiarEstado.php?id=${dato['idLinea']}" class="btn btn-info" onclick="return confirmarEliminar()"><i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i> </a>
                                    </td>
                                </tr>`;
                    });

                    //obtenemos el tbody de la tabla, para agregar sobre este las filas creadas a la tabla
                    let detalle = document.getElementById("detalle");
                    detalle.innerHTML = fila; //agregamos los resultados a la tabla*/
                },
                error: function(data) { //si surgio algun tipo de erro al realizar la consulta
                    console.log("Error incesperado");
                }
            });
        }
    </script>

    <script>
        function confirmarEliminar() {
            if (confirm("Confirmar para continuar..")) {
                window.location.href = "cambiarEstado.php?id=${dato['idLinea']}";
            } else {
                return false; // Evita que se siga el enlace si se cancela la confirmación
            }
        }
    </script>
</body>

</html>