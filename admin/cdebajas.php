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
	<title>CODE Control de Deportistas</title>
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
		input[type=text], input[type=email], input[type=tel], select {
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

// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor
require_once('conexiona.php');

// 2.- CONEXION A LA BASE DE DATOS
$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);

$sql=$link->query("SELECT * FROM  `administradores` where nombrec='$nombrea'" );
 
 // Verifica si existe la consulta.
if (!$sql) {
	echo "<script>alert('No existe el Administrador. No se puede conectar');</script>";
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
				
				   <li><a href="#">Administrador</a></li>
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
	        <h1 class="title-ucol">CODE CONTROL DE DEPORTISTAS</h1>
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
	                    Usuarios
	                </a>
	                <!--[if gte IE 7]><!--><!--<![endif]--><!--[if lte IE 6]>
	                <table>
	                    <tr>
	                        <td>
	                            <![endif]-->
	                            <ul id="subnavlist" class="dropdown-menu">
	                                <li><a href="cdealtas.php">Altas</a></li>
				                    <li><a href="cdebajas.php">Bajas</a></li>
				                    <li><a href="cdeconsulta.php">Consulta</a></li>
				                   <!-- <li><a href="#Paris">Consultas</a></li> -->
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
	                    Alumnos
	                </a>
	                <ul id="subnavlist" class="dropdown-menu">
	                    <li><a href="#">Registrar</a></li>
		                <li><a href="#">Consultar</a></li>
	                </ul>
	                <!--[if gte IE 7]><!--><!--<![endif]-->
	            </li>
	            <li class="nav-item">
	                <a class="a3 nav-link" href="#">
	                    <div class="oIcono opcion3"></div>
	                    Nutricion
	                </a>
	                <!--[if gte IE 7]><!--><!--<![endif]-->
	            </li>
	        </ul>
	    </div>
	</nav>
    
    
 <div class="container c-principal">
  <div class="row p-contenido">
	<div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 sidebar">
		<h3>Usuarios</h3>
      	<p>Bajas de Usuarios</p>
		<form class="w3-container w3-card-4 w3-padding-16 w3-white" action="cdebajas.php" method="post">
	      <div class="w3-section"> 
	    	<label>Tipo de Usuario:</label>
		  	<select id="tipou" name="tipou">
 			  <option value="1">Administrador</option>
			  <option value="2">Entrenador</option>
			  <option value="3">Deportista</option>
		    </select>
		  </div>
          <div class="w3-section">      
            <label>Num de Trabajador o de Cuenta</label>
            <input type="text" name="numero" required>
          </div>
		  <input type="hidden" name="nombrea" value="<?php echo $nombrea ?>" >
			 <input type="hidden" name="correoa" value="<?php echo $correoa ?>" >
          <button type="submit" name="submit1" >Buscar</button>
       </form>
	    	<?php
		///////////////////////////////  MK USUAURIOS ALTAS  ////////////////////////////////////
		if(isset($_POST['submit2'])){
		
			$numero =  $_POST['numero'];
			$tabla =  $_POST['tabla'];
			
			
			
			$query3="delete from $tabla where numero='$numero'";
					$result3 = mysqli_query($link, $query3);
					print("Usuario eliminado.");
		}
		///////////////////////////////  MK USUAURIOS ALTAS  ////////////////////////////////////
		if(isset($_POST['submit3'])){
			echo "Busca un nuevo usuario";
		}
		?>
	</div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-xs-12 main"> <!--Con  contenido izquierdo o derecho uno de los dos
			<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main"> 
			<div class="col-xl-6 col-lg-4 col-md-4 col-xs-12 main"> 
	<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 main" align="center"> -->
			<?php
		///////////////////////////////  MK USUAURIOS ALTAS  ////////////////////////////////////
		if(isset($_POST['submit1'])){
			$tipou =  $_POST['tipou'];
			$numero =  $_POST['numero'];
 		   
			if ($tipou == '1')
			 { 
			  $tabla='administradores';
			  $tipo='Administrador';
			 }
			if ($tipou == '2') 
			 {
			  $tabla='entrenadores';
			  $tipo='Entrenador';
			  }
			  if ($tipou == '3') 
			 {
			  $tabla='deportistas';
			  $tipo='Deportista';
			  }
		
			// $hacer = mysqli_query ($link, "SELECT * FROM tabla_usuarios");
			$sql2 = mysqli_query ($link, "SELECT * FROM $tabla where numero='$numero'");
			//$result = $link->query($sql);

			if ($sql2->num_rows > 0) {
  				// output data of each row
  				while($row = $sql2->fetch_assoc()) {
    				
				?>
 		 <table><tr>
	    	<td><label>¿Dar de baja al Usuario?  </label></td>
			<td>
			<form  action="cdebajas.php" method="post">
				<input type="hidden" name="nombrea" value="<?php echo $nombrea ?>" >
				 <input type="hidden" name="correoa" value="<?php echo $correoa ?>" >
				 <input type="hidden" name="numero" value="<?php echo $numero ?>" >
				 <input type="hidden" name="tabla" value="<?php echo $tabla ?>" >
        		<button type="submit" name="submit2" > SI </button>
			</form>
			</td>
			<td>
			<p>  </p>
			</td>
			<td>
			<form  action="cdebajas.php" method="post">
				<input type="hidden" name="nombrea" value="<?php echo $nombrea ?>" >
				 <input type="hidden" name="correoa" value="<?php echo $correoa ?>" >
        		<button type="submit" name="submit3" > NO </button>
			</form>	 
			</td></tr></table>		
	  
	    <div class="w3-section"> 
	    	<label>Tipo de Usuario:</label>
		  	<input  type="text" name="nombre" value="<?php echo $tipo; ?>" disabled="disabled">
		</div>
        <div class="w3-section">      
          <label>Num de Trabajador o de Cuenta: </label>
        	<input  type="text" name="nombre" value="<?php echo $row["numero"]; ?>" disabled="disabled">
        </div>
        <div class="w3-section">      
          <label>Nombre:</label>
          <input  type="text" name="nombre" value="<?php echo $row["nombrec"]; ?>" disabled="disabled">
        </div>  
		
		<div class="w3-section">      
          <label>Correo: </label>
          <input  type="text" name="nombre" value="<?php echo $row["correo"]; ?>" disabled="disabled">
        </div> 
		<div class="w3-section">      
          <label>Telefono: </label>
         <input  type="text" name="nombre" value="<?php echo $row["telefono"]; ?>" disabled="disabled">
        </div> 
		
		<?php
		  }
			} else {
  			echo "No existe el usuario en la base de datos. Vuelva a escoger otro usuario";
			}
		}
	?>
		
	</div>

			<div class="col-xl-2 col-lg-4 col-md-4 col-xs-12 sidebar">
				<!-- Derecha -->
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
		echo "<script>alert('No existe el Administrador.');</script>";
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
