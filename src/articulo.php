<?php

namespace Kawschool;

class Articulo{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        

         $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
         ));

 }

    public function registrar($_params){
        $sql = "INSERT INTO `articulos`(`articulo`, `descripcion`, `imagen`, `precio`, `categoriaid`, `fecha`)
        VALUES (:articulo,:descripcion,:imagen,:precio,:categoriaid,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":articulo" => $_params['articulo'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":precio" => $_params['precio'],
            ":categoriaid" => $_params['categoriaid'],
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `articulos` SET `articulo`=:articulo,`descripcion`=:descripcion,`imagen`=:imagen,`precio`=:precio,`categoriaid`=:categoriaid,`fecha`=:fecha  WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":articulo" => $_params['articulo'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":precio" => $_params['precio'],
            ":categoriaid" => $_params['categoriaid'],
            ":fecha" => $_params['fecha'],
            ":id" =>  $_params['id']
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `articulos` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT articulos.id, articulo, descripcion,imagen,nombre,precio,fecha,estado FROM articulos

        INNER JOIN categorias
        ON articulos.categoriaid = categorias.id ORDER BY articulos.id DESC
        ";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){

        $sql = "SELECT * FROM `articulos` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

}
