<?php

class CategoriaModel {
    private $db;
    
    function __construct(){
        $this-> db = $this->connectDB();
    }
    
    public function connectDB() {
        $db = new PDO('mysql:host=localhost;' . 'dbname=catalogomates;charset=utf8', 'root', '');
        return $db;
    }

    function showcategoria() {
        
        //no necesito abrir la coneccion porque la cree arriba
        
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
    
        // 3. Obtengo los datos del arreglo
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $categorias;
    } 


    public function getCategoria($id) {  

        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $query->execute([$id]);   
    
        $categoria = $query->fetch(PDO::FETCH_OBJ);
    
        return $categoria;
    }

    function insertarcategoria($categoria) {

        $query = $this->db->prepare('INSERT INTO categorias (categorias) VALUE (?)');
        $query->execute([$categoria]);

        return $this->db->lastInsertId();
    }

    function eliminarCategoria ($id) {
        
        $query = $this->db->prepare('DELETE FROM categorias WHERE id =?'); 
        $query->execute([$id]);

    }
}