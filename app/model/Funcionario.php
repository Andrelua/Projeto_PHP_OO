<?php
session_start();

class Funcionario {
    
    public $id;
    public $nome;
    public $senha;
    public $cpf;
    public $credencial;
    public $tipo;

    public static function cadastraFunc($dadosPost) {
        
        $conn = Connection::getConn();

        $nome = $dadosPost['nome'];
        $senha = $dadosPost['senha'];
        $cpf = $dadosPost['cpf'];
        $cred = $dadosPost['credencial'];
        $tipo = $dadosPost['tipo'];
        
        $sql = "INSERT INTO funcionario (nome, senha, cpf, credencial, tipo) VALUES ('$nome', '$senha', '$cpf', '$cred', '$tipo')";
        $sql = $conn->prepare($sql);
        $sql->execute();

    }

    public static function checkLogin($dadosPost) {

        $conn = Connection::getConn();

        $cred = $dadosPost['credencial'];
        $senha = $dadosPost['senha'];

        $sql = "SELECT * FROM funcionario WHERE credencial = '$cred'";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if ($sql->rowCount()) {
            $result = $sql->fetch();
            
            if ($result['senha'] == $senha) {
                $_SESSION['logado'] = True;
                $_SESSION['id_func'] = $result['id_func'];
                $_SESSION['tipo'] = $result['tipo'];
                return True;
            }
        }        
    }

    public static function checkGerente($dadosPost) {

        $conn = Connection::getConn();

        $cred = $dadosPost['credencial'];

        $sql = "SELECT * FROM funcionario WHERE credencial = '$cred'";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if ($sql->rowCount()) {
            $result = $sql->fetch();
            
            if ($result['tipo'] == 'Gerente') {
                return True;
            } else {
                return False;
            }
        }        
    }

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

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }
}