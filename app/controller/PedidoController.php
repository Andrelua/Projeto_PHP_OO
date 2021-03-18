<?php

session_start();

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

            $numero = $_SESSION['numero'];
            $id_func = $_SESSION['id_func'];
            $id_cli = $_SESSION['id_cli'];

            $id = Pedidos::selecionaIdPdd($numero, $id_func, $id_cli);

            $total = Produto::somaValor($id);
            $total = number_format($total, 2, '.', '');

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('carrinho.html');

            $params = array();
            $params['carrinho'] = $carrinho;
            $params['valor'] = $total;

            $conteudo = $template->render($params);
            echo $conteudo;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addCarrinho() {
        
        
        $qtd = Produto::selecionaQtdPdt($_POST['nome']);
        $id = Produto::selecionaIdPdt($_POST['nome']);
        
        Produto::subQuantidade($_POST['qtd'], $qtd, $id);
        
        
        Produto::addCarrinho($_POST);
        
        header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=listarProdutos ');

    }

    public function finalizarPdd() {
        
        Funcionario::finalizaPedido();

        Produto::apagaCarrinho();

        Produto::apagaPedidos();

        header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=cliente ');
    }

    
    public function cancelarPdd() {

        Produto::apagaCarrinho();

        Produto::apagaPedidos();

        header ('Location: https://localhost/Projeto_PHP_OO/index.php?pagina=home ');
    }
    
    public function single($params) {
        if ($_SESSION['logado']) {

            try {
                $singlePdd = Pedidos::buscaPddId($params);
                
                $idcli = Pedidos::buscaIdCli($params);
                $idfunc = Pedidos::buscaIdFunc($params);
                $nomeCli = Cliente::retornaNome($idcli);
                $nomeFunc = Funcionario::retornaNome($idfunc);

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('singlePdd.html');

                $params = array();
                $params['pedido'] = $singlePdd;
                $params['cliente'] = $nomeCli;
                $params['funcionario'] = $nomeFunc;

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