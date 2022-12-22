<?php

require 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$name = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');

if ($name && $sobrenome && $email) {

    if ($usuarioDAO->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setSobrenome($sobrenome);
        $novoUsuario->setEmail($email);

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
