<?php
require_once 'app/controllers/product_controller.php';
require_once 'app/response/response.php';



//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

//Este $action nos sirve para determinar cual sera la acción por defecto si no se envia nada
$action = 'listar';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

//Este $params nos parsea cada parte de la url en un elemento independiente de un array (por ejemplo home/item/1)
//En este caso  nos generara un array en el cual quedaria asi: 
//  (
//      [0] => home
//      [1] => item
//      [2] => 1
//  )

$params = explode('/', $action);

//Definimos nuestra tabla de ruteo


switch ($params[0]) {
    case 'listar':
        $controller = new ProductController($res);
        $controller->showCategoria();
        break;
}


//switch ($params[0]) {
//    case 'home':
//        echo 'templates/body';
//        break;
//    default:
//        echo '404 page not found';
//        break;
//}
