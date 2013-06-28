<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a href="/SAT/index.php" class="brand">SAT - Sistema de Administración de Turnos</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right"><li class="divider-vertical"></li>
                    <li class="dropdown <?php echo ($activo == "turno") ? 'active' : ''; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            Turnos
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a  href="/SAT/paginas/turnos/listarTurnosSecretaria.php"> Turnos de hoy </a></li>
                            <li><a  href="/SAT/paginas/turnos/listarTurnosSecretariaDesdeHoy.php"> Turnos desde hoy </a></li>
                        </ul>

                    </li>

                    <li class="<?php echo ($activo == "paciente") ? 'active' : ''; ?>"><a href="/SAT/paginas/pacientes/listar.php">Pacientes</a></li>
                    <li class="<?php echo ($activo == "obrasocial") ? 'active' : ''; ?>"><a href="/SAT/paginas/ObraSocial/listar.php" >Obras Sociales</a></li>
                    <li class="<?php echo ($activo == "especialidad") ? 'active' : ''; ?>"><a href="/SAT/paginas/Especialidad/listar.php">Especialidades</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>