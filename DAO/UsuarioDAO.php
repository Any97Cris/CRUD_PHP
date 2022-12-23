<?php

require_once 'model/Usuario.php';

class UsuarioDAU implements usuarioDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO crudphp.usuarios (nome,login,email,telefone,status) VALUES (:nome,:login,:email,:telefone,:status)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':login', $u->getLogin());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':status', $u->getStatus());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function findAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setLogin($item['login']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);
                $u->setStatus($item['status']);

                $array[] = $u;
            }
        }
        return $array;
    }

    public function findByNome($nome){
        $sql = $this->pdo->prepare("SELECT nome FROM usuarios WHERE nome like :nome");
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setLogin($data['login']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);
            $u->setStatus($data['status']);

            return $u;
        } else {
            return false;
        }
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setLogin($data['sobrenome']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);
            $u->setStatus($data['status']);

            return $u;
        } else {
            return false;
        }
    }
    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setLogin($data['sobrenome']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);
            $u->setStatus($data['status']);

            return $u;
        } else {
            return false;
        }
    }
    public function update(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, login = :login, email = :email, telefone = :telefone, status = :status WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':login', $u->getLogin());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':status', $u->getStatus());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();


        return true;
    }
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
