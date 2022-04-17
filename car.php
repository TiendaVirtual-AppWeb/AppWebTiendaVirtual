<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $articulo = new Kawschool\Articulo;
    $resultado = $articulo->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');

       

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
        //SI EL PELICULA EXISTE EN EL CARRITO
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarArticulo($id);
        }else{
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarArticulo($resultado, $id);
        }

    }else{
        //  SI EL CARRITO NO EXISTE
        agregarArticulo($resultado, $id);

    }

   

}  



?>