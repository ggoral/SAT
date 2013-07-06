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
                    <li class="<?php echo ($activo == "turno") ? 'active' : ''; ?>"><a  href="/SAT/paginas/turnos/listarTurnosHoyMedico.php"> Turnos de hoy </a></li>
                    <li class="divider-vertical"></li>
                    <li class="<?php echo ($activo == "turnoDesdeHoy") ? 'active' : ''; ?>"><a  href="/SAT/paginas/turnos/listarTurnosMedicoDesdeHoy.php"> Turnos de hoy en adelante</a></li>
                    <li class="divider-vertical"></li>
                </ul>
            </div>
        </div>
    </div>
</div>