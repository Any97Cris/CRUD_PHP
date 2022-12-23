<?php

require 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$pesquisa = filter_input(INPUT_POST, 'pesquisa');

$query = "SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%' LIMIT 5";



