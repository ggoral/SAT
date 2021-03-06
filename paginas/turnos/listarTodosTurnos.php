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
                Todos los turnos <br>
            </h3>
            <hr>
            <!-- Buscador-->
            <h5 class="text-info">Buscador:</h5>
                <form action="listarTodosTurnos.php" class="form-inline form-search"">      
                    <?php $queryOS = "select * from obrasocial where habilitada=true and eliminado=false";
                      $resultado = mysql_query($queryOS);      
                    ?>               
                    <fieldset>  
                        <input name="paciente" placeholder="Paciente" class="span2 search-query" type="text"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"> 
                        <input name="medico" placeholder="Médico" class="span2 search-query"type="text"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"> 
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
                        t.fecha_desde, t.asistencia, t.id as idTurno, t.eliminado , os.nombre as osocial, t.obrasocial_id
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