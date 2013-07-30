<?php include "../conectar.php" ?>
<?php include "procesarFiltroDesdeHoy.php" ;include "procesarSeguridad.php";?>
<?php $activo = "turno" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../modulos/head.php" ?>  
        <script src="/SAT/js/filtroTurno.js"></script>
        <title>Turnos</title>
    </head>
    <body>     
        <!--NavBar-->
        <?php include "../modulos/navBar.php" ?>
        <!-- Fin NavBar-->
        <div class="container">
            <h3>
                Turnos desde hoy en adelate <small><em>(<?php echo date("d\/m\/y"); ?>)</em></small><br></h3>
                <a href="altaTurno.php">
                    <button class="btn btn-warning btn-primary">
                        Nuevo turno <i class="icon-plus icon-white"></i>
                    </button>
                </a>
            <hr>
            <!-- Buscador-->
            <h5 class="text-info">Buscador:</h5>
                <form action="listarTurnosSecretariaDesdeHoy.php" class="form-inline form-search">     
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>
                    <fieldset>  
                        <input placeholder="Paciente" class="span2 search-query" name="paciente" class="input-medium" type="text"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"> 
                        <input placeholder="Médico" class="span2 search-query" name="medico" type="text"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"> 
                        <select class="input-medium" name="obrasocial">
                            <option value="">Obra Social</option>
                            <?php while($OS = mysql_fetch_array($resultado)){?>
                            <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                            <?php }?>
                        </select>          
                        <label> Fecha desde </label>
                        <input id="fechaDesde" name="fechaDesde"  class="span2 search-query" type="text" value="<?php $today = new \DateTime(); echo $today->format("d-m-Y")?>"> 
                        <label> Fecha hasta </label>
                        <?php $h = new \DateTime(); $h->modify('+7 day');?>
                        <input id="fechaHasta" name="fechaHasta" class="span2 search-query" type="text" value="<?php echo $h->format("d-m-Y");?>">   
                    </fieldset>
                    <br>
                    <button type="submit" class="btn btn-info btn-small" value="Buscar turno ">Buscar turno <i class="icon-search icon-white"></i></button>
                </form>
            <table id="tabla" class="table table-striped table-bordered table-condensed">  
                <thead>  
                    <tr>   
                        <th id="centrado">Paciente <a href="listarTurnosSecretariaDesdeHoy.php?ordenP=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosSecretariaDesdeHoy.php?ordenP=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>  
                        <th id="centrado">Médico <a href="listarTurnosSecretariaDesdeHoy.php?ordenM=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosSecretariaDesdeHoy.php?ordenM=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Obra Social<a href="listarTurnosSecretariaDesdeHoy.php?ordenO=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i> <a href="listarTurnosSecretariaDesdeHoy.php?ordenO=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></a></th>
                        <th id="centrado">Horario <a href="listarTurnosSecretariaDesdeHoy.php?ordenH=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosSecretariaDesdeHoy.php?ordenH=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Asistencia</th>
                        <th id="centrado">Acciones</th> 
                    </tr>  
                </thead>  
                <tbody>   
                    <?php
                    $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                        p2.apellido as apePaciente, p1.apellido as apeMedico,
                        t.fecha_desde, t.asistencia, t.id, t.eliminado , os.nombre as osocial, t.fecha_hasta
                        , t.obrasocial_id
                        FROM turno t
                        INNER JOIN medico AS m ON ( m.id = t.medico_id ) 
                        INNER JOIN paciente AS pa ON ( pa.id = t.paciente_id ) 
                        INNER JOIN persona AS p1 ON ( p1.id = m.id ) 
                        INNER JOIN persona AS p2 ON ( p2.id = pa.id )
                        INNER JOIN pacientes_obrasociales as po ON (po.paciente_id = pa.id)
                        INNER JOIN obrasocial as os ON (os.id = po.obrasocial_id)
                        WHERE " .$buscador."
                        ORDER BY " . $filtro;

                    $result = mysql_query($query);
                    while ($row = mysql_fetch_array($result) or die(mysql_error())) {
                        $fechayhora = new \DateTime($row["fecha_desde"]);
                        if ($row["eliminado"] == 0) {
                            ?>
                            <tr class='<?php
                            $clase = ($row["asistencia"] == false) ? 'warning' : 'success';
                            echo $clase;
                            ?>'> 
                                <td><?php echo $row["nomPaciente"] . " " . $row["apePaciente"] ?></td>  
                                <td><?php echo $row["nomMedico"] . " " . $row["apeMedico"] ?></td>  
                                <td><?php echo $row["osocial"] ?></td>
                                <td class ="span2" id="centrado"><?php echo $fechayhora->format("d-m-Y H:i:s") ?></td>
                                <td class ="span2" id="centrado"><?php
                                    $mensaje = ($row["asistencia"] == false) ? 'Pendiente' : 'Asistido';
                                    echo $mensaje;
                                    ?></td>
                                <td class ="span3" id="centrado">
                                    <?php $hoy = $today->format("d-m-Y");
                                    $fechaString = $fechayhora->format("d-m-Y")?>
                                    <?php if( ($row["asistencia"] == false) && ($hoy === $fechaString)){
                                        ?>
                                        <a href="cancelar.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-small">Cancelar <i class="icon-remove"></i></a></a>
                                        <a href="asistir.php?id=<?php echo $row["id"] ?>" class="btn btn-success btn-small">Asistió <i class="icon-ok"></i>
                                        </a>
     
                                    <?php } else { ?><button class="btn btn-danger btn-small disabled">Cancelar <i class="icon-remove"></i></button> <button class="btn btn-success btn-small disabled">Asistió <i class="icon-ok"></i></button><?php } ?>
                                </td>
                            </tr> <?php
                        }
                    }
                    ?>
                </tbody>  
            </table>

            <!--<div class="pagination" align="center">
              <ul>
                <li><a href="#">Anterior</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Siguiente</a></li>
              </ul>
            </div>    -->    
        </div>        <!--Fin Container-->
        <footer class="footer">   
        </footer>
    </body>        
</html>