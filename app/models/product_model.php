<?php

//El modelo es el encargado de realizar las tareas solicitadas por el controlador, por ejemplo: Listar items, detalle de items.
class productModel
{
    //Esta funcion nos abre la conexion con nuestra DB
    function connectDB()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=catalogomates;charset=utf8', 'root', '');
        return $db;
    }

    //Esta funcion nos trae de la base de datos TODOS nuestros productos
    function getProducts()
    {

        //Abrimos la conexion con nuestra base de datos
        $db = $this->connectDB();


        //Enviamos nuestra consulta correspondiente
        $query = $db->prepare("SELECT * FROM producto");
        $query->execute();

        //Realizamos un 'fetchAll' para obtener TODOS nuestros productos

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
}
