<?php
include '../conectar.php';
$idmedico = $_POST["medico"];
$query = "SELECT * 
FROM medico AS m
INNER JOIN diasatencion AS d ON ( d.`medico_id` = m.id ) 
WHERE m.id =$idmedico
        ";
$result = mysql_query($query);

?><p><span class="label label-info">Atiende los dias:<u><?php
while ($row = mysql_fetch_array($result)){
    ?>
 <?php  echo $row["dia"]?> 
<?php
    
}
?></u><i class="icon-exclamation-sign icon-white"></i></span></p><?php
?>
