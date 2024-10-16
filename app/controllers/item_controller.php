<?php
require_once './app/models/item_model.php';
require_once './app/views/item_view.php';

class ItemControllers {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new ItemModel();
        $this->view = new ItemView($res->user);
    }

    public function showItem() {
        // obtengo los mates de la DB
        $Items = $this->model->getItems();

        // mando lo que obtuve a la vista
        return $this->view->showItems($Items);
    }

    public funtion Inicio() {
          // redirijo al home 
          header('Location: ' . BASE_URL);
    }





}