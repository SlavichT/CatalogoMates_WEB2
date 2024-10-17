<?php

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=catalogomates;charset=utf8', 'root', '');
    }

    public function getProduct() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
    
        // 3. Obtengo los datos del arreglo
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $products;
    }

    public function getProducts($id) {    
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $query->execute([$id]);   
    
        $product = $query->fetch(PDO::FETCH_OBJ);
    
        return $product;
    }
}