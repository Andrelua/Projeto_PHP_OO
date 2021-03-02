<?php
session_start();

require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/core/core.php";

require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/HomeController.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/ClienteController.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/ErroController.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/LoginController.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/PedidoController.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/controller/ProdutoController.php";

require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/model/Cliente.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/model/Funcionario.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/model/Pedidos.php";
require_once "/opt/lampp/htdocs/Projeto_PHP_OO/app/model/Produto.php";

require_once "/opt/lampp/htdocs/Projeto_PHP_OO/lib/database/Connection.php";

require_once "/opt/lampp/htdocs/Projeto_PHP_OO/vendor/autoload.php";

ob_start();
    $core = new Core();
    $core->start($_GET);

    $saida = ob_get_contents();
ob_clean();

$template = file_get_contents("/opt/lampp/htdocs/Projeto_PHP_OO/app/template/dashboard.html");

$templatePronto = str_replace('{{area dinamica}}', $saida, $template);
echo $templatePronto;