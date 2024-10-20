<?php

require_once('app/models/product_model.php');
require_once('app/views/product_view.php');
require_once('app/models/category_model.php');
require_once('app/helpers/auth_helper.php');


//El controlador "maneja" todo lo que pide el usuario, si el usuario pide ver la lista de items de la pagina, el controlador se lo solicitara al modelo
//El controlador interactua con el modelo o con la vista para que estas no se tengan que comunicar entre si

class productController
{
    private $model;
    private $view;
    private $categoryModel;

    public function __construct()
    {
        $this->model = new productModel();
        $this->categoryModel = new categoryModel();
        $username = authHelper::getUsername();
        $this->view = new productView($username);
    }


    //Muestra nuestra lista de items

    public function showProducts()
    {
        $products = $this->model->getProducts();

        $this->view->showProducts($products);
    }




    //Mostrar solo UN item en detalle
    public function showProductInDetail($id_mate)
    {

        $product = $this->model->getProductById($id_mate);

        if ($product) {
            $this->view->showProductInDetail($product);
        } else {
            $this->view->showErrorGeneric("No se encontró el producto correspondiente.");
        }
    }

    // Añadir nuevo producto
    // Nos muestra la plantilla de añadir el producto
    public function showAddProductForm()
    {
        authHelper::verify();
        $categorias = $this->categoryModel->getCategories();
        $this->view->showAddProductForm($categorias);
    }

    public function addProduct()
    {
        authHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->showAddProductForm();
        }

        //Verificamos que TODOS los campos esten llenos y no vacios
        if (!isset($_POST['nombre_mate']) || empty($_POST['nombre_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el nombre del mate');
        }
        if (!isset($_POST['forma_mate']) || empty($_POST['forma_mate'])) {
            return $this->view->showErrorGeneric('Falta completar la forma del mate');
        }
        if (!isset($_POST['recubrimiento_mate']) || empty($_POST['recubrimiento_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el recubrimiento del mate');
        }
        if (!isset($_POST['imagen']) || empty($_POST['imagen'])) {
            return $this->view->showErrorGeneric('Falta completar la URL de la imagen');
        }
        if (!isset($_POST['color_mate']) || empty($_POST['color_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el color del mate');
        }
        if (!isset($_POST['id_categoria_fk']) || empty($_POST['id_categoria_fk'])) {
            return $this->view->showErrorGeneric('Falta seleccionar una categoria para el mate');
        }


        $nombre_mate = $_POST['nombre_mate'];
        $forma_mate = $_POST['forma_mate'];
        $recubrimiento_mate = $_POST['recubrimiento_mate'];
        $imagen = $_POST['imagen'];
        $color_mate = $_POST['color_mate'];
        $id_categoria_fk = $_POST['id_categoria_fk'];

        $this->model->addNewProduct($nombre_mate, $forma_mate, $recubrimiento_mate, $imagen, $color_mate, $id_categoria_fk);

        header('Location: ' . BASE_URL);
    }

    public function deleteProduct($id_mate)
    {
        authHelper::verify();
        $product = $this->model->getProductById($id_mate);

        if (!$product) {
            return $this->view->showErrorGeneric("No existe el producto con el id=$id_mate");
        }

        $this->model->deleteProductById($id_mate);

        header('Location: ' . BASE_URL);
    }

    public function showUpdateProductForm($id_mate)
    {
        authHelper::verify();
        $product = $this->model->getProductById($id_mate);
        $categorias = $this->categoryModel->getCategories();

        if ($product) {
            $this->view->showUpdateProductForm($product, $categorias);
        } else {
            $this->view->showErrorGeneric("No se encontró el producto correspondiente.");
        }
    }

    public function updateProduct($id_mate)
    {
        authHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->showUpdateProductForm($id_mate);
        }

        //Verificamos que TODOS los campos esten llenos y no vacios
        if (!isset($_POST['nombre_mate']) || empty($_POST['nombre_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el nombre del mate');
        }
        if (!isset($_POST['forma_mate']) || empty($_POST['forma_mate'])) {
            return $this->view->showErrorGeneric('Falta completar la forma del mate');
        }
        if (!isset($_POST['recubrimiento_mate']) || empty($_POST['recubrimiento_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el recubrimiento del mate');
        }
        if (!isset($_POST['imagen']) || empty($_POST['imagen'])) {
            return $this->view->showErrorGeneric('Falta completar la URL de la imagen');
        }
        if (!isset($_POST['color_mate']) || empty($_POST['color_mate'])) {
            return $this->view->showErrorGeneric('Falta completar el color del mate');
        }
        if (!isset($_POST['id_categoria_fk']) || empty($_POST['id_categoria_fk'])) {
            return $this->view->showErrorGeneric('Falta seleccionar una categoria para el mate');
        }

        $nombre_mate = $_POST['nombre_mate'];
        $forma_mate = $_POST['forma_mate'];
        $recubrimiento_mate = $_POST['recubrimiento_mate'];
        $imagen = $_POST['imagen'];
        $color_mate = $_POST['color_mate'];
        $id_categoria_fk = $_POST['id_categoria_fk'];

        $this->model->updateItem($id_mate, $nombre_mate, $forma_mate, $imagen, $recubrimiento_mate, $color_mate, $id_categoria_fk);

        header('Location: ' . BASE_URL);
    }
}
