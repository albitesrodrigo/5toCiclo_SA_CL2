<?php

//aplicamos una condicion..
if(isset($_POST["nomusu"]) && isset($_POST["clave"]) && isset($_POST["codigo"])) {

//metodo vulnerable por un sombre negro
	//recuperamos los datos del formulario logueo...
	//almacenamos los valores en las siguientes variables
	$nomusu=$_POST["nomusu"];
	$clave=$_POST["clave"];
   $codigo=$_POST["codigo"];
	//REMEDIACION CONTRA LA INYECCION XPATH...
	//$nomusu=str_replace("'","&apost;",$_POST["nomusu"]);
	//$clave=str_replace("'","&apost;",$_POST["clave"]);
   //$codigo=str_replace("'","&apost;",$_POST["codigo"]);

	//consultamos con la base de datos en formato XML para validar los usuario
	//almacenados en dicha base XML.
	$xml=new SimpleXMLElement('BautistaAlbites.xml',NULL,true);

	//realizmamo la respectiva comparacion con los datos obtenidos del formulario
   $resultado=$xml->xpath("//usuario[nomusu='".$nomusu."' and clave='".$clave."' and codigo='".$codigo."']");

   // login='' or '1'='1' and password=' ' or '1'='1'
  //aplicamos una condicion...
   if($resultado){

//si el usuario y password existe en la base de datos...
   	//nos redireccione al menu principal..
   	//redireccionamos
   	header("location:MenuPrincipal.php");

   } else {
   //cuando las credenciales son incorrectas retornamos al index....
   //emitimos un mensaje...
   $mensaje="<font color='red' size='18px' align='center'>Sistema protegido contra INYECCION XPATH</font>";	

   //mostramos el mensaje en el navegador..
   echo"<h1 align='center'>".$mensaje."</h1>" ;

   } //fin de la condicion...

}  //fin de la condicion....

?>