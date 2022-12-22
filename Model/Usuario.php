<?php

class Usuario
{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;


    public function getId()
    {
        return $this->id;
    }

    public function setId($idd)
    {
        $this->id = trim($idd);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($n)
    {
        $this->nome = ucwords(trim($n));
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sb)
    {
        $this->sobrenome = ucwords(trim($sb));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($em)
    {
        $this->email = strtolower(trim($em));
    }
}

interface usuarioDAO
{
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}
