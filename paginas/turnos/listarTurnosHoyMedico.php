<?php include "../conectar.php" ?>
<?php include "procesarFiltroHoy.php";include "procesarSeguridad.php"; ?>
<?php $activo = "turno";
$user= $_SESSION['usuario']['nombre'];      
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../modulos/head.php" ?>  
        <title>Turnos para HOY</title>
    </head>
    <body>     
        <!--NavBar-->
        <?php include "../modulos/navBar.php" ?>
        <!-- Fin NavBar-->
        <div class="container">
            <h3>
                Turnos para el día de hoy <small><em>(<?php echo date("d\/m\/y"); ?>)</em></small><br></h3>
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
                <form action="listarTurnosHoyMedico.php" class="form-inline form-search">        
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>
                    <fieldset> 
                        <input name="paciente" placeholder="Paciente" class="span2 search-query" type="text"> 
                        <select name="obrasocial">
                            <option value="">Obra Social</option>
                            <?php while($OS = mysql_fetch_array($resultado)){?>
                            <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                            <?php }?>
                        </select>
                    
                    <button type="submit" class="btn btn-info btn-small" value="Buscar turno ">Buscar turno <i class="icon-search icon-white"></i></button>
                    </fieldset>
                </form>
            <hr>
            <!-- Buscador-->
            <table id="tabla" class="table table-striped table-bordered table-condensed">  
                <thead>  
                    <tr>   
                        <th id="centrado">Paciente <a href="listarTurnosHoyMedico.php?ordenP=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosHoyMedico.php?ordenP=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>  
                        <th id="centrado">Obra Social<a href="listarTurnosHoyMedico.php?ordenO=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosHoyMedico.php?ordenO=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Horario <a href="listarTurnosHoyMedico.php?ordenH=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTurnosHoyMedico.php?ordenH=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Asistencia</th>
                    </tr>  
                </thead>  
                <tbody>   
                    <?php
                    $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                        p2.apellido as apePaciente, p1.apellido as apeMedico,
                        t.fecha_desde, t.asistencia, t.id, t.eliminado , os.nombre as osocial, 
                        m.id
                        FROM turno t
                        INNER JOIN medico AS m ON ( m.id = t.medico_id ) 
                        INNER JOIN paciente AS pa ON ( pa.id = t.paciente_id ) 
                        INNER JOIN persona AS p1 ON ( p1.id = m.id ) 
                        INNER JOIN persona AS p2 ON ( p2.id = pa.id )
                        INNER JOIN pacientes_obrasociales as po ON (po.paciente_id = pa.id)
                        INNER JOIN obrasocial as os ON (os.id = po.obrasocial_id)
                        WHERE " .$buscador." AND m.id = $idMedico
                        ORDER BY " . $filtro."";
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
        </div>        <!--Fin Container-->
        <footer class="footer">   
        </footer>
    </body>        
</html>