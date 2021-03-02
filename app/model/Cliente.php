<?php

class Cliente {

    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $endereco;
    public $telefone;
    public $cidade;
    public $estado;
    public $cep;

    public static function selecionaTodos() {
        $conn = Connection::getConn();
        
        $sql = "SELECT * FROM cliente ORDER BY nome ASC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum cliente!");
        }

        return $resultado;
    }

    public static function cadastraCliente($dadosPost) {
        
        $nome = $dadosPost['nome'];
        $cpf = $dadosPost['cpf'];
        $email = $dadosPost['email'];
        $endereco = $dadosPost['endereco'];
        $telefone = $dadosPost['telefone'];
        $cidade = $dadosPost['cidade'];
        $estado = $dadosPost['estado'];
        $cep = $dadosPost['cep']; 
        
        $conn = Connection::getConn();
        
        $sql = "INSERT INTO cliente (nome, cpf, email, endereço, telefone, cidade, estado, cep) VALUES ('$nome', '$cpf', '$email', '$endereco', '$telefone', '$cidade', '$estado', '$cep')";
        $sql = $conn->prepare($sql);
        $sql->execute();

    }

    public static function buscarById($id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM cliente WHERE id_cliente = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado o cliente!");
        }

        return $resultado;
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

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCep() {
        return $this->cep;
    }
}