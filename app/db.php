<?php


//Esta funcion nos trae de la base de datos TODOS nuestros productos
function getProducts()
{

    //Abrimos la conexion con nuestra base de datos
    $db = new PDO('mysql:host=localhost;' . 'dbname=catalogomates;charset=utf8', 'root', '');


    //Enviamos nuestra consulta correspondiente
    $query = $db->prepare('SELECT * FROM producto');
    $query->execute();

    //Realizamos un 'fetchAll' para obtener TODOS nuestros productos

    $products = $query->fetchAll(PDO::FETCH_OBJ);

    return $products;
}
