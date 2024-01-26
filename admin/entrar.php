<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php

// 3.- RECOGIDA DE DATOS DEL FORMULARIO
$nombrea=$_POST['nombrea'];
$numeroa=$_POST['numeroa'];
echo $nombrea;
print("<hr>");
echo $numeroa;
print("<hr>");

  
// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor
require_once('conexiona.php');

// 2.- CONEXION A LA BASE DE DATOS
// mysql_select_db($db_name) or die(mysql_error());
$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);

$sql2 = "SELECT * FROM `administradores` where numero='$numeroa'";
$result2 = mysqli_query($link, $sql2);

if (mysqli_num_rows($result2) > 0) {
  
  // output data of each row
  while($row = mysqli_fetch_assoc($result2)) {
    
	echo $row["correo"];
	echo "<br>";
	if ($correo == $correoa)
		{
		echo "felicidades";
		}
	else
	    {
		echo "animo";
		}
/*	echo  $row["nombrec"]. "<br>";
	$pdfnom= $row{"pdfnombre"};
	
	 echo "ver " . "<a target='_blank' href='view.php?id=".$row['id']."&tabla="."entrenadores"."&mime="."pdfmime"."&archivo="."pdfarchivo"."'> $pdfnom </a></br>";		  
 	echo "<embed src='data:".$row['pdfmime'].";base64,". base64_encode($row['pdfarchivo']) ."' width='300'>"; */
    }
   } else {
     echo "0 results";
   }

mysqli_close($link);
?>
</body>
</html>
