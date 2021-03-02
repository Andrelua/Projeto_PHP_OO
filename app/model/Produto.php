<?php

class Produto {

    public $id;
    public $nome;
    public $imagem;
    public $quantidade;

    public static function selecionarTodos() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produto ORDER BY quantidade DESC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Produto')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum produto!");
        }

        return $resultado;
    }

    public static function register($dadosPost) {

        $nome = $dadosPost['nome'];
        $cat = $dadosPost['categoria'];
        $img = $dadosPost['imagem'];
        $qtd = $dadosPost['quantidade'];

        $conn = Connection::getConn();

        $sql = "INSERT INTO produto (nome, categoria, imagem, quantidade) VALUES ('$nome', '$cat', '$img', '$qtd')";
        $sql = $conn->prepare($sql);
        $sql->execute();

    }

    public static function buscarById($id) {

        $conn = Connection::getConn();

        $sql = "SELECT * FROM produto WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado o produto!");
        }

        return $resultado;
    }

    
}