<?php

class Usuario
{
    private $id;
    private $nome;
    private $login;
    private $email;
    private $telefone;
    private $status;


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

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($sb)
    {
        $this->login = ucwords(trim($sb));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($em)
    {
        $this->email = strtolower(trim($em));
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($t){
        $this->telefone = preg_replace("/[^0-9]/", "", $t);
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($s){
        $this->status = $s;
    }


}

interface usuarioDAO
{
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByNome($nome);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}
