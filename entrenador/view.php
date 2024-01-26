<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>PDF-Visualizacion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php
// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor
require_once('conexiona.php');

// 2.- CONEXION A LA BASE DE DATOS
// mysql_select_db($db_name) or die(mysql_error());
$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);

$id = isset($_GET['id'])? $_GET['id'] : "";
 echo $id;
 $var_consulta2= "select * from entrenadores where id = '$id' ";
   		$var_resultado2 = $link->query($var_consulta2);
   		if($var_resultado2->num_rows>0)
   		  {
 			if($row2 = $var_resultado2->fetch_assoc()) {
								
				 echo "<embed src='data:".$row2['pdfmime'].";base64,".base64_encode($row2['pdfarchivo'])."' width='600' height ='600'>";
							
			}
		}				
	

?>



</body>
</html>
