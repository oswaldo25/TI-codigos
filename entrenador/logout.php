<?php 
 $saml_lib_path = "/var/simplesamlphp/lib/_autoload.php";  //La ruta donde se encuentra la librería principal de simplesamlphp
 require_once($saml_lib_path);
  $SP_ORIGEN= 'dgcfd_sicode';   // Fuente de autenticación definida en el authsources del SP
 $saml = new SimpleSAML_Auth_Simple($SP_ORIGEN);   // Se crea la instancia del saml, pasando como parametro la fuente de autenticación.
 
 //Cerrar la sesión en todos los sistemas federados
 $saml->logout("https://www.ucol.mx");