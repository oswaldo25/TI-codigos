<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<!-- meta tags requeridos -->
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="author" content="Universidad de Colima"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="Universidad de Colima"/>
	<meta property="og:image" content="http://wayf.ucol.mx/ucol_mini.png"/>
	<meta property="og:locale:alternate" content="es_ES" />
	<meta property="og:site_name" content="Universidad de Colima" />
		
	<!-- Titulo principal -->
	<title>CODEU Control de Deportistas Universitarios</title>
	<!-- link requeridos -->
	<link href="http://wayf.ucol.mx/ucol_mini.png" rel="image_src" />
	<link href="//www.ucol.mx/cms/img/favicon.ico" type="image/x-icon" rel="icon" />
	<!-- jQuery -->
	<script src="//www.ucol.mx/cms/beta/js/jquery.min.js"></script> 
	<!-- Bootstrap y header & footer agregados -->
	<link href="//www.ucol.mx/cms/headerfooterapp2.css?v=1" rel="stylesheet">
	<link href="//www.ucol.mx/cms/beta/css/carrusel.css" rel="stylesheet">
    
  
    <style>
		.breadcrumb li {
			font-size: 14px !important;
		}
		.page-breadcrumb a.btn-danger {
			padding: 0 15px;
			color: #fff !important;
		}
		
		body {font-family: Arial;}
		input[type=text], input[type=email], input[type=tel], input[type=file],select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
	</style>
  </head>
  <body>
  <?php

// Echo session variables that were set on previous page
$nombrea=$_SESSION["nombrea"];
$numero=$_SESSION["numero"];

// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor
require_once('conexiona.php');

// 2.- CONEXION A LA BASE DE DATOS
$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);

$sql=$link->query("SELECT * FROM  `entrenadores` where numero='$numero'" );
 
 // Verifica si existe la consulta.
if (!$sql) {
	echo "<script>alert('No existe el Entrenador. No se puede conectar');</script>";
    echo "<script type='text/javascript'>window.location='index.php'; </script>";
}
 
//  Verifica si tiene registro y si es asi mostrar los datos.
if($row_cnt = $sql->num_rows>0){
	
?>
	<div id="estructura">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-light bg-faded theme-primary pos-f-t">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
					<button class="navbar-toggler hidden-md-up pull-right collapsed" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false">&#x2630;</button>			        <div class="collapse navbar-toggleable-sm" id="navbar-header">
				        
			            <a class="navbar-brand" id="logo" href="//www.ucol.mx/" target="_blank">Universidad de Colima</a>
			            <span class="home-href"><a href="./"></a></span>
			            						   <!--<ul id="navlist" class="nav navbar-primary navbar-nav pull-md-right">
						   <li class="nav-item">
						      <a class="nav-link" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
						         Opcion 1
						      </a>
						           <ul id="subnavlist" class="dropdown-menu">
						              <li><a href="#">Sub opcion 1</a></li>
						              <li><a href="#">Sub opcion 2</a></li>
						           </ul>
						   </li>
						   <li class="nav-item">
						      <a class="nav-link" href="#">
						         Opcion 2
						      </a>
						   </li>
						   <li class="nav-item">
						      <a class="nav-link" href="#">
						         Opcion 3
						      </a>
						   </li>
						</ul>-->
			        </div>
				</div>
			</div>
		</div>
    </nav> <!-- /navbar -->
     <section class="page-breadcrumb"> 
     <div class="container "> 
     	<div id="path">
	        	<ol class="breadcrumb">
	            	<!--<li>Usted está en:</li> -->
	           <!--  <li><a href="cdeprincipal.php">Inicio</a></li> -->
				
				   <li><a href="#">Entrenador</a></li>
			</ol>
        </div>
        <div id="sesion">
	        	<ol class="breadcrumb">
	            	
	            <li class="user-name"><?php echo $nombrea; ?></li>
	            <li><a href="logout.php">Salir</a></li>
			</ol>
        </div>
     </div> <!--cierra path-->
    </section>
	<section class="page-header">
        <div class="container">
	        <h1 class="title-ucol">CONTROL DE DEPORTISTAS UNIVERSITARIOS (CODEU)</h1>
	    </div><!--/ Cierra .container /-->
    </section>
    <nav class="nav-sistema">
    		<button class="navbar-toggler hidden-md-up pull-right collapsed" type="button" data-toggle="collapse" data-target="#navbar-header2" aria-controls="navbar-header2" aria-expanded="false">☰</button>
		<div class="collapse navbar-toggleable-sm" id="navbar-header2">
	        <ul id="navlist" class="nav navbar-primary navbar-nav pull-md-right">
			    <li class="nav-item">
	                <a class="a3 nav-link" href="index.php">
	                    <div class="oIcono opcion3"></div>
	                    Inicio
	                </a>
	                <!--[if gte IE 7]><!--><!--<![endif]-->
	            </li>
	            <li class="nav-item">
	                <a class="a1 nav-link" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
	                    <div class="oIcono opcion1"></div>
	                    Proyecto Operativo
	                </a>
	                <!--[if gte IE 7]><!--><!--<![endif]--><!--[if lte IE 6]>
	                <table>
	                    <tr>
	                        <td>
	                            <![endif]-->
	                            <ul id="subnavlist" class="dropdown-menu">
	                              <li><a href="cdepoenviar.php">Enviar</a></li>
				                    <li><a href="cdepoconsulta.php">Consultar</a></li>
				                   <!-- <li><a href="cdeconsulta.php">Consulta</a></li>
				                    <li><a href="#Paris">Consultas</a></li> -->
	                            </ul>
	                            <!--[if lte IE 6]>
	                        </td>
	                    </tr>
	                </table>
	                </a><![endif]-->
	            </li>
	            <li class="nav-item">
	                <a class="a1 nav-link" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
	                    <div class="oIcono opcion1"></div>
	                    Deportistas
	                </a>
	                <ul id="subnavlist" class="dropdown-menu">
	                    <li><a href="cderegistro.php">Registrar</a></li>
		                <li><a href="cdecatalogo.php#">Consultar</a></li>
	                </ul>
	                <!--[if gte IE 7]><!--><!--<![endif]-->
	            </li>
				<li class="nav-item">
	                <a class="a1 nav-link" data-hover="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
	                    <div class="oIcono opcion1"></div>
	                    Asistencias
	                </a>
	                <ul id="parciales" class="dropdown-menu">
	                    <li><a href="#">Parcial 1</a></li>
		                <li><a href="#">Parcial 2</a></li>
						<li><a href="#">Parcial 3</a></li>
	                </ul>
	                <!--[if gte IE 7]><!--><!--<![endif]-->
	            </li>
	           <!-- <li class="nav-item">
	                <a class="a3 nav-link" href="#">
	                    <div class="oIcono opcion3"></div>
	                    Contacto
	                </a>
	             
	            </li> -->
	        </ul>
	    </div>
	</nav>
    
    
 <div class="container c-principal">
  <div class="row p-contenido">
			<div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 sidebar">
			 <h3>DEPORTISTAS</h3>
      	   <p>Registro de Deportistas</p>
				<?php
		///////////////////////////////  MK USUAURIOS ALTAS  ////////////////////////////////////
		if(isset($_POST['submit1'])){
		
			$numerod =  $_POST['numerod'];
			$nombre =   $_POST['nombre'];
			$apellido =   $_POST['apellido'];
			$correo =   $_POST['correo'];
			$disciplina = $_POST['disciplina'];
			$escuela =   $_POST['escuela'];
			$telefono =   $_POST['telefono'];
			$nombreb = $apellido . " " . $nombre;
			$nombreu= strtoupper($nombreb);
		
		  $tabla='deportistas';
		  // 2.- CONEXION A LA BASE DE DATOS
			$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);
		  	$sql2 = "SELECT * FROM $tabla";
		    $result2 = mysqli_query($link, $sql2);
			$registrado=0;
			if (mysqli_num_rows($result2) > 0) {
				 while($row2 = mysqli_fetch_assoc($result2)) {
 					if ($numero == $row2["numero"])
					{
						$registrado=1;
					}
				 }
			}
				if ($registrado == 1)
					{
						print("No se puede registra este deportista.<br>");
						print("Porque ya existe un deportista con este numero de cuenta.<br>");
						print("Vuelve a escribir otros nuevos datos.<br>");
					} else
					{
					   $query2="insert into $tabla (numero, nombre, apellido, nombrec, correo, disciplina, escuela, telefono, numentrenador, nomentrenador, fecha) values ('$numerod','$nombre','$apellido','$nombreu','$correo','$disciplina','$escuela','$telefono', '$numero', '$nombrea', NOW())";
					 	$result = mysqli_query($link, $query2);
		 				echo '<script>alert("Deportista agregado con Exito.")</script>';
						
						
						 $query3="insert into hnutriologico (numero, fecha) values ('$numerod',   NOW())";
					 	$result3 = mysqli_query($link, $query3);
		 				echo '<script>alert("Deportista agregado a la tabla de historial nutriologico con Exito.")</script>';
						
						 $query4="insert into hmedico (numero, fecha) values ('$numerod',   NOW())";
					 	$result4 = mysqli_query($link, $query4);
		 				echo '<script>alert("Deportista agregado a la tabla de historial Medico con Exito.")</script>';
						
						 $query5="insert into hpsicologico (numero, fecha) values ('$numerod',   NOW())";
					 	$result5 = mysqli_query($link, $query5);
		 				echo '<script>alert("Deportista agregado a la tabla de historial psicologico con Exito.")</script>';
					}
			  
		 mysqli_close($link);
		}
		?>	     
  	 
			</div>
			 <div class="col-xl-8 col-lg-8 col-md-8 col-xs-12 main"> <!--Con  contenido izquierdo o derecho uno de los dos
			<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main"> 
			<div class="col-xl-6 col-lg-4 col-md-4 col-xs-12 main"> 
	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main" align="center"> -->
		
	     <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="cderegistro.php" method="post">
	   
        <div class="w3-section">      
          <label>Numero de Cuenta:</label>
          <input type="text" name="numerod" required>
        </div>
        
        <div class="w3-section">      
          <label>Nombre:</label>
          <input  type="text" name="nombre" required>
        </div>  
		<div class="w3-section">      
          <label>Apellidos:</label>
          <input  type="text" name="apellido" required>
        </div> 
		<div class="w3-section">      
          <label>Correo:</label>
          <input type="email" name="correo">
        </div> 
		 <div class="w3-section"> 
	    	<label>Disciplina Deportiva:</label>
		  	<select name="disciplina" >
			  <option value="Atletismo">Atletismo</option>
			  <option value="Futbol">Futbol</option>
			  <option value="Futbol_Rapido">Futbol Rapido</option>
			  <option value="Natacion">Natacion</option>
			  <option value="Beisbol">Beisbol</option>
			  <option value="Tenis">Tenis</option>
			  <option value="Tae_Kwon_Do">Tae Kwon Do</option>
			  <option value="Karate_Do">Karate Do</option>
			  <option value="Judo">Judo</option>
			  <option value="Baloncesto">Baloncesto</option>
			  <option value="Voleibol">Voleibol</option>
			  <option value="Balonmano">Balonmano</option>
			  <option value="Halterofilia">Halterofilia</option>
		    </select>
		</div>
		 <div class="w3-section"> 
	    	<label>Escuela donde estudia:</label>
		  	<select name="escuela" >
			  <option value="Bachillerato 1">Bachillerato 1</option>
			  <option value="Bachillerato 2">Bachillerato 2</option>
			  <option value="Bachillerato 3">Bachillerato 3</option>
			  <option value="Bachillerato 4">Bachillerato 4</option>
			  <option value="Bachillerato 5">Bachillerato 5</option>
			  <option value="Bachillerato 6">Bachillerato 6</option>
			  <option value="Bachillerato 7">Bachillerato 7</option>
			  <option value="Bachillerato 8">Bachillerato 8</option>
			  <option value="Bachillerato 9">Bachillerato 9</option>
			  <option value="Bachillerato 10">Bachillerato 10</option>
			  <option value="Bachillerato 11">Bachillerato 11</option>
			  <option value="Bachillerato 12">Bachillerato 12</option>
			  <option value="Bachillerato 13">Bachillerato 13</option>
			  <option value="Bachillerato 14">Bachillerato 14</option>
			  <option value="Bachillerato 15">Bachillerato 15</option>
			  <option value="Bachillerato 16">Bachillerato 16</option>
			  <option value="Bachillerato 17">Bachillerato 17</option>
			  <option value="Bachillerato 18">Bachillerato 18</option>
			  <option value="Bachillerato 19">Bachillerato 19</option>
			  <option value="Bachillerato 20">Bachillerato 20</option>
			  <option value="Bachillerato 21">Bachillerato 21</option>
			  <option value="Bachillerato 22">Bachillerato 22</option>
			  <option value="Bachillerato 23">Bachillerato 23</option>
			  <option value="Bachillerato 24">Bachillerato 24</option>
			  <option value="Bachillerato 25">Bachillerato 25</option>
			  <option value="Bachillerato 26">Bachillerato 26</option>
			  <option value="Bachillerato 27">Bachillerato 27</option>
			  <option value="Bachillerato 28">Bachillerato 28</option>
			  <option value="Bachillerato 29">Bachillerato 29</option>
			  <option value="Bachillerato 30">Bachillerato 30</option>
			  <option value="Bachillerato 31">Bachillerato 31</option>
			  <option value="Bachillerato 32">Bachillerato 32</option>
			  <option value="Bachillerato 33">Bachillerato 33</option>
			  <option value="Bachillerato 34">Bachillerato 34</option>
			  <option value="Bachillerato 35">Bachillerato 35</option>
			  <option value="Bachillerato (IUBA)">Bachillerato (IUBA)</option>
			  <option value="Escuela Técnica de Enfermería">Escuela Técnica de Enfermería</option>
			  <option value="Instituto Universitario de Bellas Artes">Instituto Universitario de Bellas Artes</option>
			  <option value="Facultad de Medicina">Facultad de Medicina</option>
			  <option value="Facultad de Enfermería">Facultad de Enfermería</option>
			  <option value="Facultad de Psicología">Facultad de Psicología</option>
			  <option value="Facultad de Telemática">Facultad de Telemática</option>
			  <option value="Facultad de Letras y Comunicación">Facultad de Letras y Comunicación</option>
			  <option value="Facultad de Trabajo Social">Facultad de Trabajo Social</option>
			  <option value="Facultad de Contabilidad y Administración Colima">Facultad de Contabilidad y Administración Colima</option>
			  <option value="Escuela de Mercadotecnia">Escuela de Mercadotecnia</option>
			  <option value="Facultad de Ciencias de la Educación">Facultad de Ciencias de la Educación</option>
			  <option value="Facultad de Ciencias">Facultad de Ciencias</option>
			  <option value="Facultad de Ciencias Políticas y Sociales">Facultad de Ciencias Políticas y Sociales</option>
			  <option value="Facultad de Derecho">Facultad de Derecho</option>
			  <option value="Facultad de Ciencias Químicas">Facultad de Ciencias Químicas</option>
			  <option value="Facultad de Ingeniería Civil">Facultad de Ingeniería Civil</option>
			  <option value="Facultad de Arquitectura y Diseño">Facultad de Arquitectura y Diseño</option>
			  <option value="Facultad de Ingeniería Mecánica y Eléctrica">Facultad de Ingeniería Mecánica y Eléctrica</option>
			  <option value="Facultad de Ciencias Biológicas y Agropecuarias">Facultad de Ciencias Biológicas y Agropecuarias</option>
			  <option value="Facultad de Medicina Veterinaria Zootecnista">Facultad de Medicina Veterinaria Zootecnista</option>
			  <option value="Facultad de Contabilidad y Administración Tecomán">Facultad de Contabilidad y Administración Tecomán</option>
			  <option value="Facultad de Pedagogía">Facultad de Pedagogía</option>
			  <option value="Facultad de Turismo">Facultad de Turismo</option>
			  <option value="Facultad de Filosofía">Facultad de Filosofía</option>
			  <option value="Facultad de Lenguas Extranjeras">Facultad de Lenguas Extranjeras</option>
			  <option value="Facultad de Economía">Facultad de Economía</option>
			  <option value="Facultad de Ingeniería Electromecánica">Facultad de Ingeniería Electromecánica</option>
			  <option value="Facultad de Ciencias Marinas">Facultad de Ciencias Marinas</option>
			  <option value="Escuela de Comercio Exterior">Escuela de Comercio Exterior</option>
			  <option value="Facultad de Contabilidad y Administración Manzanillo">Facultad de Contabilidad y Administración Manzanillo</option>
			  <option value="Facultad de Turismo y Gastronomía">Facultad de Turismo y Gastronomía</option>
			  
		    </select>
				
		</div>
		 
		<div class="w3-section">      
          <label>Telefono:</label>
          <input type="tel" name="telefono" placeholder="3123112345">
        </div> 
		
			
        <button type="submit" name="submit1" >Registrar</button>
      </form>
		
		
	</div>

			<div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 sidebar">
				
			</div> 
  </div>
		<div class="row p-inferior">
			<div class="col-md-12 p-content"></div>
		</div>
 </div>

</div>
 <?php
} else {
?>
<div class="container c-principal">
  <div class="row p-contenido">
			<!--<div class="col-xl-3 col-lg-4 col-md-4 col-xs-12 sidebar">
				Izquierda
			</div>
			 <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 main"> <--Con  contenido izquierdo o derecho uno de los dos
			<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main"> 
			<div class="col-xl-6 col-lg-4 col-md-4 col-xs-12 main"> -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main">	
	<?php
		echo "<script>alert('No existe el Entrenador2.');</script>";
				echo "<script type='text/javascript'>window.location='index.php'; </script>";
	?>
	
	
	</div>
  </div>
</div>
	<?php
	}
	?>
    <footer class="bd-footer text-muted" role="contentinfo">
	    <div class="container">
		    <div class="row">
			    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 center-links">
				    <img src="//www.ucol.mx/cms/beta/img/icon/ubicacion.svg" width="20"> Direcci&oacute;n: Av. Universidad No. 333, Las V&iacute;boras; CP 28040 Colima, Colima, M&eacute;xico
			    </div>
			    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 center-links">
				    &copy; Derechos Reservados 2018-2021 Universidad de Colima
			    </div>
		    </div>
	    </div>
	</footer>
    
    <!-- JS Bootstrap -->
    <script src="//www.ucol.mx/cms/beta/dist/js/tether.min.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/beta/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/beta/dist/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <!-- JS adds -->
    <script src="//www.ucol.mx/cms/beta/js/jquery.slides.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/beta/js/carruselV3.2.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/beta/js/jquery.flexisel0815.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/beta/js/purl.js"></script>
    <script src="//www.ucol.mx/cms/beta/js/custom.min.js" type="text/javascript"></script>
    <script src="//www.ucol.mx/cms/js/custom.js" type="text/javascript"></script>
    <!-- HTML5 shim y Respond.js para soporte IE8 de elementos HTML5 y media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--script>
        // Carousel Auto-Cycle
		$(document).ready(function() {
			//$('#navcontainer > #navlist').attr('data-spy','affix').attr('data-offset-top',100).attr('data-offset-bottom', 531);
			$('#sliderNaN>.rslides').responsiveSlides({auto:true,pager:true,nav:true,timeout:6000,speed:800});
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
		    $( '.form-search-ucol' ).click( function() {
				$( this ).addClass( 'active' );
			}).focusout( function() {
				$( this ).removeClass( 'active' );
			});
			$('#navcontainer > #navlist').affix({
			  offset: {
			    top: 100,
			    bottom: function () {
			      return (this.bottom = $('footer').outerHeight(true)+100)
			    }
			  }
			});
			var modWidth = $( '#navcontainer' ).width() - 30;
		    $( '#navlist' ).width( modWidth );
			jQuery( window ).resize( function () {
		        if ( jQuery( window ).width() ) {
			        var modWidth = $( '#navcontainer' ).width() - 30;
		           $( '#navlist' ).width( modWidth );
		        }
			});

			
		});
    </script-->
			
  </body>
</html>
