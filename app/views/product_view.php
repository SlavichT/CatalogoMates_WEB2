<?php

class ProductView {
    private $user = null;

    function __construct($user) {
        $this->user = $user;
    }

    function showCategoria($categoria) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($categoria);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_productos.phtml';
    }

    public function showError($error) {

        require 'templates/error.phtml';
    }
}