<?php
include_once('app/db.php');
include_once('app/product.php');
//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


//Este $action nos sirve para determinar cual sera la acción por defecto si no se envia nada
$action = 'listar';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

//Este $params nos parsea cada "campo" de la url en un elemento independiente de un array (por ejemplo home/item/1) donde cada uno sera un elemento.
//En este caso  nos genera un array el cual queda de la siguiente manera: 
//  (
//      [0] => home
//      [1] => item
//      [2] => 1
//  )

$params = explode('/', $action);

//Definimos nuestra tabla de ruteo

// listar   ->     getProducts(); 

switch ($params[0]) {
    case 'listar':
        showProducts();
        break;
    default:
        echo '404 page not found';
        break;
}
