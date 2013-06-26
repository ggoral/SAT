<?php 
include "../conectar.php";
$queryObra = "select * from obrasocial where eliminado=false";
$resObra = mysql_query($queryObra);
?><option value="">Seleccione Obra Social</option><?php 
while($Obra = mysql_fetch_array($resObra)){
?>     
    <option value="<?php echo $Obra["id"] ?>"> <?php echo $Obra["nombre"]?></option>  
<?php    
}
?>