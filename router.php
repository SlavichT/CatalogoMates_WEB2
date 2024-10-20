<?php

require_once('app/controllers/product_controller.php');
require_once('app/controllers/auth_controller.php');

//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

session_start();

//Este $action nos sirve para determinar cual sera la acción por defecto si no se envia nada
$action = 'listar';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

//Este $params nos parsea cada "campo" de la url en un elemento independiente de un array (por ejemplo mostrar/1) donde cada uno sera un elemento.
//En este caso  nos genera un array el cual queda de la siguiente manera: 
//  (
//      [0] => mostrar
//      [1] => item
//  )

$params = explode('/', $action);

switch ($params[0]) {

        //'listar' Nos muestra TODOS los productos de nuestra pagina y a que categoria pertenece (en este caso "Material de fabricacion: ")
    case 'listar':

        $controller = new productController();
        $controller->showProducts();
        break;

        //'mostrar' Nos muestra en detalle UN solo producto en especifico
    case 'mostrar':
        $controller = new productController();
        $controller->showProductInDetail($params[1]);
        break;

        //'agregar' Nos lleva a un formulario para agregar un nuevo producto al catalogo
    case 'agregar':

        $controller = new productController();
        $controller->addProduct();
        break;

        //'eliminar' Elimina directamente un producto del catalogo
    case 'eliminar':

        $controller = new productController();
        $controller->deleteProduct($params[1]);
        break;

        //'editar' Nos lleva a un formulario para editar un producto ya existente en el catalogo
    case 'editar':

        $controller = new productController();
        $controller->updateProduct($params[1]);
        break;

        //'showLogin' Se encarga de mostrarnos el formulario de login
    case 'showLogin':
        $controller = new authController();
        $controller->showLogin();
        break;

        //'login' Se encarga de TODO el proceso de login.
    case 'login':
        $controller = new authController();
        $controller->login();
        break;

        //'logout' Se encarga de hacer logout.
    case 'logout':
        $controller = new authController();
        $controller->logout();

    default:
        echo '404 page not found';
        break;
}
