<?php
include_once('app/models/product_model.php');
include_once('app/views/product_view.php');

//El controlador "maneja" todo lo que pide el usuario, si el usuario pide ver la lista de items de la pagina, el controlador se lo solicitara al modelo.
//El controlador interactua con el modelo o con la vista para que estas no se tengan que comunicar entre si.

class productController
{
    private $model;
    private $view;

    public function __construct()
    {
        //$this -> model = new productModel();
        //$this ->view = new productView();
    }

    //Muestra nuestra lista de items

    //public function showProducts() {}
}
