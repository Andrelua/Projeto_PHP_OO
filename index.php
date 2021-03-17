<?php
session_start();

require_once "app/core/core.php";

require_once "app/controller/HomeController.php";
require_once "app/controller/ClienteController.php";
require_once "app/controller/ErroController.php";
require_once "app/controller/LoginController.php";
require_once "app/controller/PedidoController.php";
require_once "app/controller/ProdutoController.php";

require_once "app/model/Cliente.php";
require_once "app/model/Funcionario.php";
require_once "app/model/Pedidos.php";
require_once "app/model/Produto.php";

require_once "lib/database/Connection.php";

require_once "vendor/autoload.php";

ob_start();
    $core = new Core();
    $core->start($_GET);

    $saida = ob_get_contents();
ob_clean();

$template = file_get_contents("/opt/lampp/htdocs/Projeto_PHP_OO/app/template/dashboard.php");

$templatePronto = str_replace('{{area dinamica}}', $saida, $template);
echo $templatePronto;