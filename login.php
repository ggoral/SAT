
<?php
$error = "false";
if (array_key_exists('error', $_GET)) {
    $error = "true";
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="/SAT/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/SAT/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
        
        <!--JQUERY-->
        <script type="text/javascript" src="/SAT/js/jquery-1.9.1.js"></script>
        
        <!--JAVASCRIPT BOOTSTRAT-->
        <script src="/SAT/js/bootstrap.min.js"></script>
        <script src="/SAT/js/bootstrap-modal.js"></script>
        <script src="/SAT/js/bootstrap-modalmanager.js"></script>
        
        <script>
          $(document).ready(function(){
              
              var error =<?php echo $error ?>;
              
              if(!error){
                  $("#modalAlert").hide();
              }else{
                   $("#modalAlert").show();
              }
              $(".alert").alert();
          });
        </script>
        
        <style>
            div.row {
                padding-top: 4%;
            }
        </style>
            <style type="text/css"> 
        body { 
            background: url('img/background.png');
            background-repeat: repeat;
        } 

    </style> 
    </head>
    <body>
        <div class="container">
            <h3 class="muted">SAT - Sistema de administración de turnos</h3>
            <hr>
            <div class="row">
                <div class="span4 offset4 well">
                    <legend>Iniciar sesión</legend>
                    <div id="modalAlert" class="alert alert-error fade in">
                        <button class="close" data-dismiss="alert" type="button">×</button>
                        El usuario o la contraseña no son validos.
                    </div>
                    <form method="POST" action="/SAT/paginas/modulos/procesarLoggin.php" accept-charset="UTF-8">
                        <input type="text" id="username" class="input-block-level" name="username" placeholder="Nombre de usuario" autocomplete="off">
                        <input type="password" class="input-block-level" id="password"  name="password" placeholder="Contraseña">

                        <button type="submit" name="submit" class="btn btn-info btn-block">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>







