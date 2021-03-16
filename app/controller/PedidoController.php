<?php

class PedidoController {
    
    public function listar() {
        if ($_SESSION['logado']) {

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
            
        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
        
    }

    public function pesquisa() {

        if ($_SESSION['logado']) {

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

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }

    public function criarPedido() {

        if ($_SESSION['logado']) {

            $id_cliente = Cliente::retornaIdCpf($_POST['cpf']);

            $criacao = Pedidos::createPdd($id_cliente, $_POST);

            header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=listarProdutos');

        } else {
            header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin ');
        }
    }

    public function carrinhoView() {

        try {

            $carrinho = Produto::produtosCarrinho();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('carrinho.html');

            $params = array();
            $params['carrinho'] = $carrinho;

            $conteudo = $template->render($params);
            echo $conteudo;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addCarrinho() {

        echo "Teste";
        
        /* $carrinho = Produto::addCarrinho($_POST);

        header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=listarProdutos '); */

    }
    
    public function single($params) {
        if ($_SESSION['logado']) {

            try {
                $singleCli = Cliente::buscarById($params);

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('singlePdd.html');

                $params = array();
                $params['singles'] = $singleCli;

                $conteudo = $template->render($params);
                echo $conteudo;
        
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        } else {
            header('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=erro&metodo=erroLogin');
        }
    }
}