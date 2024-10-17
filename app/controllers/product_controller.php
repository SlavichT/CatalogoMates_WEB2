<?php
require_once './app/models/product_model.php';
require_once './app/views/product_view.php';

class ProductControllers {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new ProductModel();
        $this->view = new ProductView($res->user);
    }

    public function showProduct() {
        // obtengo los mates de la DB
        $Products = $this->model->getProducts();

        // mando lo que obtuve a la vista
        return $this->view->showProducts($Products);
    }

    //public funtion Inicio() {
          // redirijo al home 
    //    header('Location: ' . BASE_URL);
    }





