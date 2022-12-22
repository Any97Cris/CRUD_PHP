<?php
require_once 'database.php';
require_once 'dao/UsuarioDAOMySQL.php';
require_once 'model/Usuario.php';


$usuarioDAO = new UsuarioDAOMySQL($pdo);
$lista = $usuarioDAO->findAll();


?>

<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<body style="background-color: #DCDCDC;">

    <div class="container">
        <a href="adicionar.php" class="btn btn-dark mt-5 mb-5">ADICIONAR USUÁRIO</a>
        <table class="table table-light table-striped text-center">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
            <?php foreach ($lista as $usuario) : ?>
                <tr>
                    <th><?= $usuario->getId(); ?></th>
                    <th><?= $usuario->getNome(); ?></th>
                    <th><?= $usuario->getSobrenome(); ?></th>
                    <th><?= $usuario->getEmail(); ?></th>
                    <th>
                        <a href="editar.php?id=<?= $usuario->getId(); ?>" style="margin-right: 5px;">
                            <img src="img/edi.png" alt="editar_img">
                        </a>
                        <a href="excluir.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                            <img src="img/del.png" alt="deleta_img">
                        </a>
                    </th>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>