<?php
include_once('app/controllers/product_controller.php');
//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


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
    case 'listar':
        $controller = new productController();
        $controller->showProducts();
        break;
    case 'mostrar':
        $controller = new productController();
        $controller->showProductInDetail($params[1]);
        break;
    case 'agregar':
        $controller = new productController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addProduct();
        } else {
            $controller->showAddProductForm();
        }
        break;
    case 'eliminar':
        $controller = new productController();
        $controller->deleteProduct($params[1]);
        break;
    case 'editar':
        $controller = new productController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateProduct($params[1]);
        } else {
            $controller->showUpdateProductForm($params[1]);
        }
        break;
    default:
        echo '404 page not found';
        break;
}
