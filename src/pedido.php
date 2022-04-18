<?php

namespace Kawschool;

class Pedido{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registrar($_params){
        $sql = "INSERT INTO `pedidos`(`clienteid`, `total`, `fecha`) 
        VALUES (:clienteid,:total,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":clienteid" => $_params['clienteid'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha'],
            
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalles_pedidos`(`pedidoid`, `articuloid`, `precio`, `cantidad`) 
        VALUES (:pedidoid,:articuloid,:precio,:cantidad)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedidoid" => $_params['pedidoid'],
            ":articuloid" => $_params['articuloid'],
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad'],
        );

        if($resultado->execute($_array))
            return  true;

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT p.id, nombre, apellidos, correo, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.clienteid = c.id ORDER BY p.id DESC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT p.id, nombre, apellidos, correo, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.clienteid = c.id WHERE p.id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute($_array ))
            return  $resultado->fetch();

        return false;
    }

    public function mostrarDetallePorIdPedido($id)
    {
        $sql = "SELECT 
                dp.id,
                ar.articulo,
                dp.precio,
                dp.cantidad,
                ar.imagen
                FROM detalles_pedidos dp
                INNER JOIN articulos ar ON ar.id= dp.articuloid
                WHERE dp.pedidoid = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute( $_array))
            return  $resultado->fetchAll();

        return false;

    }
    public function mostrarUltimos()
    {
        $sql = "SELECT p.id, nombre, apellidos, correo, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.clienteid = c.id ORDER BY p.id DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }


}