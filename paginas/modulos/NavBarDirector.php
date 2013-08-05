<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a href="/SAT/index.php" class="brand">SAT - Sistema de Administración de Turnos</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li><a><span class="muted"><b>Logueado como: </b></span><span class="text-error"><?php echo $usuario['nombre']?></span></a></li>
                    <li><a href="/SAT/paginas/modulos/logout.php"><b class="text-info">SALIR</b></a></li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown <?php echo ($activo == "turno") ? 'active' : ''; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            Turnos
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a  href="/SAT/paginas/turnos/listarTurnosHoyDirector.php"> Turnos de hoy </a></li>
                            <li><a  href="/SAT/paginas/turnos/listarTodosTurnos.php"> Todos los turnos </a></li>
                        </ul>

                    </li>

                    <li class="<?php echo ($activo == "paciente") ? 'active' : ''; ?>"><a href="/SAT/paginas/pacientes/listarDirector.php">Pacientes</a></li>
                    <li class="<?php echo ($activo == "medico") ? 'active' : ''; ?>"><a href="/SAT/paginas/medicos/listar.php">Medicos</a></li>
                    <li class="<?php echo ($activo == "secretaria") ? 'active' : ''; ?>"><a href="/SAT/paginas/secretarias/listar.php">Secretarias</a></li>
                    <li class="<?php echo ($activo == "reportes") ? 'active' : ''; ?>"><a href="/SAT/paginas/reportes/reportes.php">Reporte</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>