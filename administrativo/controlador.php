<?php
require '../vendor/autoload.php';

$pelicula = new Kawschool\Articulo;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['articulo']))
            exit('Completar articulo');
        
        if(empty($_POST['descripcion']))
            exit('Completar descripción');

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
}

if ($_POST['accion']==='Editar'){

    if(empty($_POST['articulo']))
    exit('Completar articulo');
    
    if(empty($_POST['descripcion']))
        exit('Completar descripcion');

    if(empty($_POST['categoriaid']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoriaid']))
        exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'articulo'=>$_POST['articulo'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoriaid'=>$_POST['categoriaid'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    if(!empty($_POST['imagen_temp']))
        $_params['imagen'] = $_POST['imagen_temp'];
    
    if(!empty($_FILES['imagen']['name']))
        $_params['imagen'] = subirimagen();

    $rpt = $pelicula->actualizar($_params);
    if($rpt)
        header('Location: articulos/index.php');
    else
        print 'No se modificó el artículo';

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $pelicula->eliminar($id);
    
    if($rpt)
        header('Location: articulos/index.php');
    else
        print 'Error al eliminar un articulo';
}

function subirimagen() {

    $carpeta = __DIR__.'/../assets/img_articulos/';

    $archivo = $carpeta.$_FILES['imagen']['name'];
    echo $archivo;
    move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo);

    return $_FILES['imagen']['name'];
}
