<?php

require_once __DIR__ . '/CategoriaModel.php';

class ArtigoModel {

    private $categoriaModel;
    private $tabela = "artigo";
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
        $this->categoriaModel = new CategoriaModel();
    }

    public function listar() {
        $query = "SELECT a.*, c.nome AS cnome
                 FROM $this->tabela a
                 LEFT JOIN categoria c ON a.idCategoria = c.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listarComCategorias() {
        $query = "SELECT a.*, c.nome AS cnome
                 FROM $this->tabela a
                 LEFT JOIN categoria c ON a.idCategoria = c.id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $query = "SELECT a.*, c.nome AS cnome
                 FROM $this->tabela a
                 LEFT JOIN categoria c ON a.idCategoria = c.id
                 WHERE a.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function criar($dados) {
        $query = "INSERT INTO {$this->tabela} (titulo, idCategoria, conteudo) VALUES (:titulo, :idCategoria, :conteudo)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $dados['titulo']);
        $stmt->bindParam(':idCategoria', $dados['idCategoria']);
        $stmt->bindParam(':conteudo', $dados['conteudo']);
        
        return $stmt->execute();
    }
    
    public function editar($id, $dados) {
        $query = "UPDATE {$this->tabela} SET 
                  titulo = :titulo, 
                  idCategoria = :idCategoria, 
                  conteudo = :conteudo 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titulo', $dados['titulo']);
        $stmt->bindParam(':idCategoria', $dados['idCategoria']);
        $stmt->bindParam(':conteudo', $dados['conteudo']);
        
        return $stmt->execute();
    }
}