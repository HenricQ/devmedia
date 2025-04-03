<?php
require_once __DIR__ . '/../../../config/env.php';
require_once __DIR__ . '/../../../model/ArtigoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigoModel = new ArtigoModel();
    
    $dados = [
        'id' => $_POST['id'] ?? null,
        'titulo' => $_POST['titulo'] ?? '',
        'conteudo' => $_POST['conteudo'] ?? '',
        'idCategoria' => $_POST['idCategoria'] ?? null
    ];
    
    if (empty($dados['id'])) {
        $artigoModel->criar($dados);
    } else {
        $artigoModel->editar($dados['id'], $dados);
    }
}

header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigos.php');
exit;