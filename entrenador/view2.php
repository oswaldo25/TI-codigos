<?php


   include("conexion.php");
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Natacion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php
$id = isset($_GET['id'])? $_GET['id'] : "";
 //echo $id;
 //consulta la tabla que contiene la informacion
$consulta=mysql_query(" SELECT * FROM fichas WHERE idres='$id'") or die("No se pudo".mysql_error());
		if ($resultado=mysql_fetch_array($consulta)){
	
	//echo "Ok resumen existente";
	//echo $resultado['nombreres'];
	
	header("Content-Type:".$resultado['mimeres']);
  
 	echo $resultado['archivores'];
// $bytes = $resultado['archivores'];
 //$nombre= $resultado['nombreres'];
//header("Content-type: application/pdf");
//header('Content-disposition: attachment; filename= ".$resultado[archivores]."');
//print $bytes;
	  }
 
  

?>



</body>
</html>
