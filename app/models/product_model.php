<?php

//El modelo es el encargado de realizar las tareas solicitadas por el controlador, por ejemplo: Listar items, detalle de items.
class productModel
{
    //Esta funcion nos abre la conexion con nuestra DB
    private function connectDB()
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

    function getProductById($id_mate)
    {
        $db = $this->connectDB();

        $query = $db->prepare("SELECT * FROM producto WHERE id_mate = ?");
        $query->execute([$id_mate]);

        //Realizamos en este caso un 'fetch' ya que solo necesitamos UN solo producto.
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    //Funcion para agregar un nuevo producto

    //function addProduct($forma_mate, $recubrimiento_mate)
    //{
    //    $db = $this->connectDB();

    //    $query = $db->prepare('INSERT INTO producto (forma_mate, recubrimiento_mate) VALUES (?, ?)');
    //    $query->execute([$forma_mate, $recubrimiento_mate]);
    //    //$id_mate = $db->lastInsertId();
    //    //return $id_mate;
    //}
}
