<?php

if($_SERVER['REQUEST_METHOD'] ==='POST') {

$nombre_usuario = $_POST['nombre_usuario'];
$clave = $_POST ['clave'];
require '../vendor/autoload.php';
$usuario = new Kawschool\Usuario;
$resultado = $usuario->login($nombre_usuario, $clave);
  
if ($resultado) {
  header ('Location: dashboard.php');
  }else{
exit (json_encode(array('estado'=>FALSE,'mensaje'=>'Error al iniciar session')));
  }
  
}
