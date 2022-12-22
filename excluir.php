<?php

require_once 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDAO->delete($id);
}

header("Location: index.php");
exit;
