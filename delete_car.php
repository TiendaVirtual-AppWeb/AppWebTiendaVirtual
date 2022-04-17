<?php
session_start();

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: car.php');

$id = $_GET['id'];

if(isset($_SESSION['car'])){
    unset($_SESSION['car'][$id]);   
    header('Location: car.php');
}else{
    header('Location: index.php');
}
