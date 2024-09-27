<?php

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
    $db = new PDO('mysql:host=localhost;' . 'dbname=catalogomates;charset=utf8', 'root', '');


    //Enviamos nuestra consulta correspondiente
    $query = $db->prepare("SELECT * FROM producto");
    $query->execute();

    //Realizamos un 'fetchAll' para obtener TODOS nuestros productos

    $products = $query->fetchAll(PDO::FETCH_OBJ);

    return $products;
}

//Esta funcion nos trae de la base de datos UN solo producto
function getProductById($id)
{
    $db = new PDO('mysql:host=localhost;' . 'dbname=catalogomates;charset=utf8', 'root', '');

    $query = $db->prepare("SELECT * FROM producto WHERE id = ?");
    $query->execute();

    //Realizamos en este caso un 'fetch' ya que solo necesitamos UN solo producto.
    $product = $query->fetch(PDO::FETCH_OBJ);

    return $product;
}
