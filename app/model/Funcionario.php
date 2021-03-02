<?php

class Funcionario {
    
    private $id;
    private $nome;
    private $senha;
    private $cpf;
    private $credencial;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setCredencial($credencial) {
        $this->credencial = $credencial;
    }

    public function getCredencial() {
        return $this->credencial;
    }
}