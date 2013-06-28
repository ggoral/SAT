<?php include "../conectar.php" ?>
<?php include "procesarFiltroTodos.php";include "procesarSeguridad.php"; ?>
<?php $activo = "turno" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../modulos/head.php" ?>  
        <title>Turnos</title>
    </head>
    <body>     
        <!--NavBar-->
        <?php include "../modulos/navBar.php" ?>
        <!-- Fin NavBar-->
        <div class="container">
            <h3>
                Turnos para el día de hoy <small><em>(<?php echo date("d\/m\/y"); ?>)</em></small><br>
                <form action="listarTodosTurnos.php"<?php ?> class="form-inline">      
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>               
                    <div class="controls-row">
                        <label> Paciente </label>    
                        <input name="paciente" class="input-medium" type="text"> 
                        <label> Medico </label>
                        <input name="medico" class="input-medium" type="text"> 
                        <label> Obra Social </label>
                        <select name="obrasocial">
                            <option value="">Ninguna</option>
                            <?php while($OS = mysql_fetch_array($resultado)){?>
                            <option value="<?php echo $OS['id']?>"><?php echo $OS['nombre']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <input type="submit" class="btn" value="Buscar">
                </form>
            </h3>
            <table id="tabla" class="table table-striped table-bordered table-condensed">  
                <thead>  
                    <tr>   
                        <th id="centrado">Paciente <a href="listarTodosTurnos.php?ordenP=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTodosTurnos.php?ordenP=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>  
                        <th id="centrado">Médico <a href="listarTodosTurnos.php?ordenM=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTodosTurnos.php?ordenM=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Obra Social<a href="listarTodosTurnos.php?ordenO=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTodosTurnos.php?ordenO=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Horario <a href="listarTodosTurnos.php?ordenH=ASC<?php echo $linkBuscador ?>"><i class="icon-chevron-down"></i></a> <a href="listarTodosTurnos.php?ordenH=DESC<?php echo $linkBuscador ?>"><i class="icon-chevron-up"></i></a></th>
                        <th id="centrado">Asistencia</th>
                    </tr>  
                </thead>  
                <tbody>   
                    <?php
                    $query = "SELECT p2.nombre as nomPaciente,p1.nombre as nomMedico,
                        p2.apellido as apePaciente, p1.apellido as apeMedico,
                        t.fecha_desde, t.asistencia, t.id, t.eliminado , os.nombre as osocial 
                        FROM turno t
                        INNER JOIN medico AS m ON ( m.id = t.medico_id ) 
                        INNER JOIN paciente AS pa ON ( pa.id = t.paciente_id ) 
                        INNER JOIN persona AS p1 ON ( p1.id = m.id ) 
                        INNER JOIN persona AS p2 ON ( p2.id = pa.id )
                        INNER JOIN pacientes_obrasociales as po ON (po.paciente_id = pa.id)
                        INNER JOIN obrasocial as os ON (os.id = po.obrasocial_id)
                        WHERE " .$buscador."
                        ORDER BY " . $filtro."";
                    $result = mysql_query($query);
                    while ($row = mysql_fetch_array($result) or die(mysql_error())) {
                        $fechayhora = new \DateTime($row["fecha_desde"]);
                            ?>
                            <tr class='<?php
                            $clase = ($row["asistencia"] == false) ? 'warning' : 'success';
                            if($row['eliminado']==1){$clase = "error";}
                            echo $clase;
                            ?>'> 
                                <td><?php echo $row["nomPaciente"] . " " . $row["apePaciente"] ?></td>  
                                <td><?php echo $row["nomMedico"] . " " . $row["apeMedico"] ?></td>  
                                <td><?php echo $row["osocial"] ?></td>
                                <td class ="span2" id="centrado"><?php echo $fechayhora->format("d-m-Y H:i:s") ?></td>
                                <td class ="span2" id="centrado"><?php
                                    if ($row['eliminado'] == 1){$mensaje = 'Cancelado';}
                                    else{$mensaje = ($row["asistencia"] == false) ? 'Pendiente' : 'Asistido';}
                                    echo $mensaje;
                                    ?></td>
                            </tr> <?php
    
                    }
                    ?>
                </tbody>  
            </table>   
        </div>        <!--Fin Container-->
        <footer class="footer">   
        </footer>
    </body>        
</html>