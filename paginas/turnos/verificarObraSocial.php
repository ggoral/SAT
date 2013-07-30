<?php
include '../conectar.php';
$osocial = $_POST["osocial"];
$query = "SELECT habilitada FROM obrasocial
          WHERE id = $osocial";
if ($osocial != 0){
$result = mysql_query($query);
while ($row = mysql_fetch_array($result)){
    if ($row["habilitada"] == 0){
       ?> <span class="label label-important">La obra social no esta habilitada<i class=" icon-warning-sign icon-white"></i></span>
       <script language="Javascript">
           $("#especialidad").attr("disabled","disabled");
       </script>
           <?php
    }
}}
?>
