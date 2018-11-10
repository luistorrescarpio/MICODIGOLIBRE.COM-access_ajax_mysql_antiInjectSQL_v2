<?php 
//Script para conexión con base de datos en Mysql
include("db_controller/mysql_script.php");
$obj = (object)$_REQUEST;

//Aplicamos protección contra la inyección SQL 
$obj = injectProtected_obj($obj); //Filtramos todas los parametros del paquete (object) recibido desde el formulario de acceso

//validación de acceso en DB
$r = query("SELECT * FROM account WHERE ac_email='$obj->email' AND ac_password='$obj->password'");

if( count($r)>0 ){

  session_start();

  $_SESSION['user'] = $r[0]; //Pasamos todos los datos del usuario en la variable de sessión user
                             // Esto permitira tener los datos del usuario en cualquier pagina que tenga 
                             // la sessión iniciada (Esto solo lo almacenara hasta que la sessión sea destruida)

  //Reenviamos a la cuenta del Usuario logeado correctamente
  echo json_encode([
	"success"=>1  //permitido
	,"message"=>"Acceso Correcto"
	,"link"=>"my_account.php"
  ]);

}else{
  //Si uno de los campos no coincide, el acceso es denegado y retornado al inicio
  echo json_encode([
	"success"=>0  //permitido
	,"message"=>"Acceso Incorrecto"
  ]);
}

function injectProtected_obj($object){
  foreach ($object as $item => $val) {    
    //Funcción que permitira realizar un filtro de los caracteres que permitan la modificación de las consultas SQL (Filtrado de protección SQL)
    $object->$item = str_replace(
        ["'","|","‘","’",'“','”']
      , ['\"',"","&#8216;","&#8217;","&#8220;","&#8221;"]
      , $val
    );
  }
  return $object; //Object Filtrado
}
?>