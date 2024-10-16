<?php
include_once('app/models/product_model.php');
include_once('app/views/product_view.php');

//El controlador "maneja" todo lo que pide el usuario, si el usuario pide ver la lista de items de la pagina, el controlador se lo solicitara al modelo
//El controlador interactua con el modelo o con la vista para que estas no se tengan que comunicar entre si

class productController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new productModel();
        $this->view = new productView();
    }


    //Muestra nuestra lista de items
    function showProducts()
    {


        //Obtenemos los productos del modelo

        $products = $this->model->getProducts();


        //Actualizamos la vista

        $this->view->showProducts($products);
    }




    //Mostrar solo UN item en detalle
    function showProductInDetail($id_mate)
    {

        $product = $this->model->getProductById($id_mate);

        if ($product) {
            $this->view->showProductInDetail($product);
        } else {
            $this->view->showErrorGeneric("No se encontró el producto correspondiente.");
        }
    }

    //NUEVO PRODUCTO
    function showAddProductForm()
    {
        $this->view->showAddProductForm();
    }

    function addProduct()
    {
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


        $nombre_mate = $_POST['nombre_mate'];
        $forma_mate = $_POST['forma_mate'];
        $recubrimiento_mate = $_POST['recubrimiento_mate'];
        $imagen = $_POST['imagen'];
        $color_mate = $_POST['color_mate'];
        $id_categoria_fk = $_POST['id_categoria_fk'];

        $this->model->addNewProduct($nombre_mate, $forma_mate, $recubrimiento_mate, $imagen, $color_mate, $id_categoria_fk);

        header('Location: ' . BASE_URL);
        exit;
    }
}
