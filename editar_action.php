<?php

require 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');

if ($name && $sobrenome && $email) {
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setSobrenome($sobrenome);
    $usuario->setEmail($email);

    $usuarioDAO->update($usuario);

    header('Location: index.php');
    exit;
} else {
    header("Location: editar.php?id=" . $id);
    exit;
}
