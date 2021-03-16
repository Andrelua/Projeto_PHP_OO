<?php
session_start();

class Produto {

    public $id;
    public $nome;
    public $valor;
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
        $qtd = $dadosPost['quantidade'];
        $vlr = $dadosPost['valor'];

        $conn = Connection::getConn();

        $sql = "INSERT INTO produto (nome, categoria, quantidade, valor_und) VALUES ('$nome', '$cat', '$qtd', '$vlr')";
        $sql = $conn->prepare($sql);
        $sql->execute();

    }

    public static function update($dadosPost) {

        $nome = $dadosPost['nome'];
        $cat = $dadosPost['categoria'];
        $qtd = $dadosPost['quantidade'];
        $vlr = $dadosPost['valor'];
        $id = $dadosPost['id'];

        $conn = Connection::getConn();

        $sql = "UPDATE produto SET nome = '$nome', categoria = '$cat', quantidade = '$qtd', valor_und = '$vlr' WHERE id = '$id'";
        $sql = $conn->prepare($sql);
        $sql->execute();

    }

    public static function updateCar($dadosPost) {

        $qtd = $dadosPost['quantidade'];
        $preco = $dadosPost['preco'];
        $id = $dadosPost['id'];

        $vlr = $qtd * $preco;

        $conn = Connection::getConn();

        $sql = "UPDATE carrinho SET preco_produto = '$vlr', qtd_produto = '$qtd' WHERE id_carrinho = '$id'";
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

    public static function buscarById2($id) {

        $conn = Connection::getConn();

        $sql = "SELECT * FROM carrinho WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi possivel editar o produto!");
        }

        return $resultado;
    }

    public static function deleteById($id) {

        $conn = Connection::getConn();

        $sql = "DELETE FROM produto WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

    public static function deletePdtCar($id) {

        $conn = Connection::getConn();

        $sql = "DELETE FROM carrinho WHERE id_carrinho = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

    public static function produtosCarrinho() {

        $conn = Connection::getConn();

        $numero = $_SESSION['numero'];
        $id_func = $_SESSION['id_func'];
        $id_cli = $_SESSION['id_cli'];

        $id = Pedidos::selecionaIdPdd($numero, $id_func, $id_cli);

        $sql = "SELECT * FROM carrinho WHERE id_pedido = '$id'";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Produto')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não tem nenhum produto no carrinho!");
        }

        return $resultado;
    }

    public static function addCarrinho($dadosPost) {

        $nome = $dadosPost['nome'];
        $preco = $dadosPost['preco'];
        $qtd = $dadosPost['qtd'];

        $calc = $preco * $qtd;

        $numero = $_SESSION['numero'];
        $id_func = $_SESSION['id_func'];
        $id_cli = $_SESSION['id_cli'];

        $id = Pedidos::selecionaIdPdd($numero, $id_func, $id_cli);

        $conn = Connection::getConn();

        $sql = "INSERT INTO carrinho (nome_produto, preco_produto, qtd_produto, id_pedido) VALUES ('$nome', '$calc', '$qtd', '$id')";
        $sql = $conn->prepare($sql);
        $start = $sql->execute();
        
        if ($start) {
            return True;
        }
    }
}