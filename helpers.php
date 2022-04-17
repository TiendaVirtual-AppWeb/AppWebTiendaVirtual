<?php 
 
function agregarArticulo($resultado, $id, $cantidad=1){ 
    $_SESSION['car'][$id] = array( 
        'id' => $resultado['id'], 
        'articulo' => $resultado['articulo'], 
        'imagen' => $resultado['imagen'], 
        'precio' => $resultado['precio'], 
        'cantidad' => $cantidad 
   ); 
} 
 
 
function actualizarArticulo($id,$cantidad = FALSE){ 
 
    if($cantidad) 
        $_SESSION['car'][$id]['cantidad'] = $cantidad; 
    else 
        $_SESSION['car'][$id]['cantidad']+=1; 
} 
 
 
function calcularTotal(){ 
 
    $total = 0; 
    if(isset($_SESSION['car'])){ 
        foreach($_SESSION['car'] as $indice => $value){ 
            $total += $value['precio'] * $value['cantidad']; 
        } 
    } 
    return $total; 
 
} 
 
function cantidadArticulos(){ 
    $cantidad = 0; 
    if(isset($_SESSION['car'])){ 
        foreach($_SESSION['car'] as $indice => $value){ 
           $cantidad++; 
        } 
    } 
 
    return $cantidad; 
}
