<?php

class ItemModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
    }
 
    public function getItem() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $Items = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $Items;
    }
 
    public function getItems($id) {    
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $query->execute([$id]);   
    
        $Items = $query->fetch(PDO::FETCH_OBJ);
    
        return $Item;
    }