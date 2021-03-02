<?php

class PedidoController {

    public function index() {
        echo "Listar todos pedidos realizados";
    }

    public function criar() {
        echo "Teste";
    }
    
    public function listar() {

        try {
            $pedidos = Pedidos::selecionarTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('pedidosRealizados.html');

            $params = array();
            $params['pedidos'] = $pedidos;

            $conteudo = $template->render($params);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function pesquisa() {

        try {
            $pesquisa = Pedidos::buscarByNumber($_POST);

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('pesquisa.html');

            $params = array();
            $params['pedidos'] = $pesquisa;

            $conteudo = $template->render($params);
            echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}