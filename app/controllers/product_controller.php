<?php
require_once './app/models/product_model.php';
require_once './app/views/product_view.php';

class ProductController {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new Productmodel();
        $this->view = new ProductView($res->user);
    }

    function showCategoria() {
        
        // obtengo los mates de la DB
        $categoria = $this->model->getcategoria();
        
        //actualizo la vista
        $this->view->showCategoria($categoria);
        // mando lo que obtuve a la vista
        
        return $this->view->showCategoria($categoria);
    }

    function addcategoria ($categoria) {
        $categoria = $_POST['categoria'];

        //verifico campos obligatorios
        if (empty($categoria)){
            $this->view->showError('faltan datos obligatorios');
            die();
        }

        //inserto la categoria
        id = $this->model->addCategoria($categoria);

        //redirigimos al listado
        header("location:");
    }
    
    function showError ($msg) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>$msg</h2>";
    }
    }





