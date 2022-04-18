<?php

session_start();

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    require 'helpers.php';
    require 'vendor/autoload.php';

    if(isset($_SESSION['car']) && !empty($_SESSION['car'])){
        $cliente = new Kawschool\Cliente;
    
        $_params = array(
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'correo' => $_POST['correo'],
            'telefono' => $_POST['telefono'],
            'comentario' => $_POST['comentario']
        );
    
        $cliente_id = $cliente->registrar($_params);
    
        $pedido = new Kawschool\Pedido;
    
        $_params = array(
            'clienteid'=>$cliente_id,
            'total' => calcularTotal(),
            'fecha' => date('Y-m-d')
        );
        
        $pedido_id =  $pedido->registrar($_params);

        foreach($_SESSION['car'] as $indice => $value){
            $_params = array(
                "pedidoid" => $pedido_id,
                "articuloid" => $value['id'],
                "precio" => $value['precio'],
                "cantidad" => $value['cantidad'],
            );

            $pedido->registrarDetalle($_params);
        }

        $_SESSION['car'] = array();

        header('Location: pedidoexitoso.php');

    }
}