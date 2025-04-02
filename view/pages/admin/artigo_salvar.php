<?php
require_once __DIR__ . '/../../../config/env.php';
require_once __DIR__ . '/../../../model/ArtigoModel.php';

// Verifica se é uma submissão POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigoModel = new ArtigoModel();
    
    // Prepara os dados
    $dados = [
        'id' => $_POST['id'] ?? null,
        'titulo' => $_POST['titulo'] ?? '',
        'conteudo' => $_POST['conteudo'] ?? '',
        'idCategoria' => $_POST['idCategoria'] ?? null
    ];
    
    // Decide entre criar ou editar
    if (empty($dados['id'])) {
        // Modo criação
        $artigoModel->criar($dados);
    } else {
        // Modo edição
        $artigoModel->editar($dados['id'], $dados);
    }
}

// Redireciona de volta para a lista
header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigos.php');
exit;