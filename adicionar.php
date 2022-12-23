<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style.css">

    <title>Cadastrar</title>
</head>

<body>
    <form method="POST" action="adicionar_action.php">
        <div class="container mt-5">
            <h2 class="mb-5">Cadastrar Usuário</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" required name="nome" class="form-control" style="width: 40%;" id="exampleFormControlInput1" placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Login</label>
                <input type="text" required name="login" class="form-control" style="width: 40%;" id="exampleFormControlInput1" placeholder="Login">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" required name="email" class="form-control" style="width: 40%;" id="exampleFormControlInput1" placeholder="fulano@exemplo.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                <input type="text" required name="telefone" class="form-control" style="width: 40%;" id="exampleFormControlInput1" placeholder="DDD+Número" maxLength="11">
            </div>
            <div class="mb-5">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <input type="text" required name="status" class="form-control" style="width: 40%;" id="exampleFormControlInput1" placeholder="Digite A ou I" maxLength="1">
                <span class="legenda">
                    <ul>
                        <li>A = Ativo</li>
                        <li>I = Inativo</li>
                    </ul>
                </span>
            </div>
            <!--BOTÕES-->
            <div style="display:inline-block;" class="mb-5">
                <input class="btn btn-warning mr-2" type="submit" value="Adicionar">
                <a class="btn btn-secondary" href="index.php">Menu</a>
            </div>

        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>