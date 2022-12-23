<?php

require 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$name = filter_input(INPUT_POST, 'nome');
$login = filter_input(INPUT_POST, 'login');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$status = filter_input(INPUT_POST, 'status');

// var_dump($status);
// exit;

if ($name && $login && $email) {

    if ($usuarioDAO->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setLogin($login);
        $novoUsuario->setEmail($email);
        $novoUsuario->setTelefone($telefone);
        $novoUsuario->setStatus($status);

        $usuarioDAO->add($novoUsuario);

        header('Location: index.php');
        exit;
    } else {
        header('Location: adicionar.php');
        exit;
    }
} else {
    header("Location: adicionar.php");
    exit;
}
