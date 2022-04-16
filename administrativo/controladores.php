<?php
require '../vendor/autoload.php';

$pelicula = new Kawschool\Articulo;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['articulo']))
            exit('Completar articulo');
        
        if(empty($_POST['descripcion']))
            exit('Completar articulo');

        if(empty($_POST['categoriaid']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['categoriaid']))
            exit('Seleccionar una Categoria válida');

        
        $_params = array(
            'articulo'=>$_POST['articulo'],
            'descripcion'=>$_POST['descripcion'],
            'imagen'=> subirimagen(),
            'precio'=>$_POST['precio'],
            'categoriaid'=>$_POST['categoriaid'],
            'fecha'=> date('Y-m-d')
        );

        $rpt = $pelicula->registrar($_params);

        if($rpt)
            header('Location: articulos/index.php');
        else
            print 'Error al registrar un articulo';
        

    }


function subirimagen() {

    $carpeta = __DIR__.'../assets/imagenes/';

    $archivo = $carpeta.$_FILES['imagen']['name'];

    move_images_file($_FILES['imagen']['tmp_name'],$archivo);

    return $_FILES['imagen']['name'];


}
