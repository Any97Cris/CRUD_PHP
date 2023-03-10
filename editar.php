<?php

require_once 'database.php';
require_once 'dao/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAU($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuario = $usuarioDAO->findById($id);
}

if ($usuario === false) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style.css">
    <title>Editar</title>
</head>

<body style="background-color: 	#DCDCDC;">
    <form method="POST" action="editar_action.php">
        <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
        <div class="container mt-5">
            <h2 class="mb-5">Editar Usuário</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" name="nome" value="<?= $usuario->getNome(); ?>" class="form-control" style="width: 40%;" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Login</label>
                <input type="text" name="login" value="<?= $usuario->getLogin(); ?>" class="form-control" style="width: 40%;" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" value="<?= $usuario->getEmail(); ?>" class="form-control" style="width: 40%;" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                <input type="text" required name="telefone" value="<?= $usuario->getTelefone(); ?>" class="form-control" style="width: 40%;" id="exampleFormControlInput1" maxLength="11">
            </div>
            <div class="mb-5">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <input type="text" required name="status" value="<?= $usuario->getStatus(); ?>" class="form-control" style="width: 40%;" id="exampleFormControlInput1" maxLength="1">
                <span class="legenda">
                    <ul>
                        <li>A = Ativo</li>
                        <li>I = Inativo</li>
                    </ul>
                </span>
            </div>
            <!--BOTÕES-->
            <div style="display:inline-block;" class="mb-5">
                <input class="btn btn-warning mr-2" type="submit" value="Editar">
                <a class="btn btn-secondary" href="index.php">Menu</a>
            </div>

        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>