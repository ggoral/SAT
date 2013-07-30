<?php include "../conectar.php" ?>
<?php include "procesarFiltroDesdeHoy.php" ;include "procesarSeguridad.php";?>
<?php $activo = "turnoDesdeHoy" ;$user= $_SESSION['usuario']['nombre']; ?>
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
            <?php 
            $queryNombreMedico = "
                SELECT nombre, apellido, m.id as medID FROM persona as p
                INNER JOIN medico as m ON (m.id = p.id)
                INNER JOIN usuario as u ON (u.id = m.id)
                WHERE (u.username = '$user')";
            $resulNombre= mysql_query($queryNombreMedico);
            while ($rowNombre = mysql_fetch_array($resulNombre)){
                $idMedico = $rowNombre['medID'];
            ?>
            <h5>Doctor: <span class="muted"><?php echo $rowNombre['nombre']." ".$rowNombre['apellido'];?></span></h5>
            <?php    
            }
            ?>
            <hr>
            <!-- Buscador-->
            <h5 class="text-info">Buscador:</h5>
                <form action="listarTurnosMedicoDesdeHoy.php" class="form-inline form-search">     
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>
                    <fieldset>  
                        <input placeholder="Paciente" class="span2 search-query" name="paciente" class="input-medium" type="text"> 
                        <input placeholder="Médico" class="span2 search-query" name="medico" type="text"> 
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
                        <th id="centrado">Paciente <a href="listarTurnosMedicoDesdeHoy.php?ordenP=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosMedicoDesdeHoy.php?ordenP=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>  
                        <th id="centrado">Obra Social<a href="listarTurnosMedicoDesdeHoy.php?ordenO=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i> <a href="listarTurnosMedicoDesdeHoy.php?ordenO=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></a></th>
                        <th id="centrado">Horario <a href="listarTurnosMedicoDesdeHoy.php?ordenH=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosMedicoDesdeHoy.php?ordenH=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Asistencia</th>
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
                        WHERE " .$buscador." AND m.id = $idMedico
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
                                <td><?php echo $row["osocial"] ?></td>
                                <td class ="span2" id="centrado"><?php echo $fechayhora->format("d-m-Y H:i:s") ?></td>
                                <td class ="span2" id="centrado"><?php
                                    $mensaje = ($row["asistencia"] == false) ? 'Pendiente' : 'Asistido';
                                    echo $mensaje;
                                    ?></td>
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