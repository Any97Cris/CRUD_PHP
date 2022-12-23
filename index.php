<?php
require_once 'database.php';
require_once 'dao/UsuarioDAO.php';
require_once 'model/Usuario.php';


$usuarioDAO = new UsuarioDAU($pdo);
$lista = $usuarioDAO->findAll();


?>

<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Usuarios</title>
    <link rel="stylesheet" href="src/style.css">
</head>

<body>

<header>
    <img src="img/logo_n_solucoes.png" alt="logo" style="width:90px">
</header>

    <div class="container">
        <h2 class="text-center">Listagem de Usuários</h2>
        <form action="index.php">
            <div class="row mt-5 mb-5 text-center">
                <div class="col">
                <a href="adicionar.php" class="btn btn-dark">ADICIONAR USUÁRIO</a>
                </div>
                
                <div class="col">
                <input type="text" class="form-control" style="width:550px;" placeholder="Digite sua pesquisa...">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-dark" value="Pesquisar">
                </div>
                
            </div>
        </form>

        <table class="table table-light table-striped">
            <tr>
                <th>NOME</th>
                <th>LOGIN</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">AÇÕES</th>
            </tr>
            <?php foreach ($lista as $usuario) : ?>
                <tr>
                    <th><?= $usuario->getNome(); ?></th>
                    <th><?= $usuario->getLogin(); ?></th>
                    <th><?= $usuario->getEmail(); ?></th>
                    <th><?= $usuario->getTelefone();?></th>
                    <th class="text-center"><?= $usuario->getStatus(); ?></th>
                    <th class="text-center">
                        <a href="#">
                            <img src="img/eye.png" alt="visualizar_img" style="margin-right: 5px;">
                        </a>
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