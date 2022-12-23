<?php

require 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'nome');
$login = filter_input(INPUT_POST, 'login');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$status = filter_input(INPUT_POST, 'status');

if ($name && $login && $email) {
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setLogin($login);
    $usuario->setEmail($email);
    $usuario->setTelefone($telefone);
    $usuario->setStatus($status);

    $usuarioDAO->update($usuario);

    header('Location: index.php');
    exit;
} else {
    header("Location: editar.php?id=" . $id);
    exit;
}
