<?php
require_once __DIR__ . '/../config/Database.php';

class UsuarioModel {
    private $tabela = "usuario";
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $query = "SELECT * FROM {$this->tabela}";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM {$this->tabela} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        $query = "INSERT INTO {$this->tabela} (nome, email, dataNascimento, cpf) 
                  VALUES (:nome, :email, :dataNascimento, :cpf)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':dataNascimento', $dados['dataNascimento']);
        $stmt->bindParam(':cpf', $dados['cpf']);
        
        return $stmt->execute();
    }

    public function editar($dados) {
        $query = "UPDATE {$this->tabela} SET 
                  nome = :nome,
                  email = :email,
                  dataNascimento = :dataNascimento,
                  cpf = :cpf
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $dados['id']);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':dataNascimento', $dados['dataNascimento']);
        $stmt->bindParam(':cpf', $dados['cpf']);
        
        return $stmt->execute();
    }

    public function excluir($id) {
        $query = "DELETE FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}