<?php

session_start();

class Pedidos {

    public $id;
    public $numero;
    public $id_func;
    public $id_cli;
    public $data;
    public $valor = 0.0;

    public static function selecionarTodos() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM pedido_rlz ORDER BY data_fnz DESC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Pedidos')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum pedido realizado!");
        }

        return $resultado;
    }

    public static function buscarByNumber($number) {

        $numero = $number['pesquisa'];

        $conn = Connection::getConn();

        $sql = "SELECT * FROM pedido_rlz WHERE numero_pdd LIKE '%$numero%'";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Pedidos')) {
            $resultado[] = $row;
        }
        
        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum pedido com esse número!");
        }

        return $resultado;
    }

    public static function createPdd($id_cli, $dadosPost) {

        $conn = Connection::getConn();

        $numero = $dadosPost['numero'];
        $forma = $dadosPost['forma'];
        $id_func = $_SESSION['id_func'];
        
        
        $sql = "INSERT INTO pedido (numero_pdd, forma_pag, id_func, id_cliente) VALUES ('$numero', '$forma', '$id_func', '$id_cli')";
        $sql = $conn->prepare($sql);
        $start = $sql->execute();
        
        if ($start) {
            
            $_SESSION['pedido'] = True;
            $_SESSION['id_pdd'] = selecionaIdPdd($numero, $forma, $id_func, $id_cli);
            
        }
    }

    public function selecionaIdPdd($num, $forma, $id_func, $id_clien) {

        $conn = Connection::getConn();

        $sql = "SELECT * FROM pedido WHERE numero_pdd = '$num' AND forma_pag = '$forma' AND id_func = '$id_func' AND id_cliente = '$id_clien'";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if ($sql->rowCount()) {
            $result = $sql->fetch();
            
            return $result['id'];
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setIdFunc($id_func) {
        $this->id_func = $id_func;
    }

    public function getIdFunc() {
        return $this->id_func;
    }

    public function setIdCli($id_cli) {
        $this->id_cli = $id_cli;
    }

    public function getIdCli() {
        return $this->id_cli;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getValor() {
        return $this->valor;
    }
}