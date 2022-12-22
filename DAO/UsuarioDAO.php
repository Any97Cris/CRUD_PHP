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
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email) VALUES (:nome, :sobrenome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':sobrenome', $u->getSobrenome());
        $sql->bindValue(':email', $u->getEmail());
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
                $u->setSobrenome($item['sobrenome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }
        return $array;
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
            $u->setSobrenome($data['sobrenome']);
            $u->setEmail($data['email']);

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
            $u->setSobrenome($data['sobrenome']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }
    public function update(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':sobrenome', $u->getSobrenome());
        $sql->bindValue(':email', $u->getEmail());
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
