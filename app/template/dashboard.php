<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
          body {
          background-color: #7a60a0;
          margin: 0px;
          
        }
        .container2 {
            background-color: #7a60a0;
            color: black;
            margin-top: 100px;
        }
        .container {
            background-color: #fff;
            color: black;
        }
        .float form {
            width: 80%;
        }
        .float form button{
            width: 70%;
            float: left;
        }
        .float form button{
            width: 30%;
            float: right;
        }
        .flex-box {
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .container-box {
        height: 300px;
        }
        .content-box {
        background-color: black;
        color: white;
        text-align: center;
        width: 200px;
        }
        .dinamic {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            flex-direction: unset;
        }
        .box {
            padding-top: 12px;
            padding-left: 20px;
            padding-right: 20px;
            width: 1332px;
            background: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
      <header class="float">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <h2><a href="https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=pedido" style="text-decoration: none; color: black;"> Dashboard</a></h2>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://localhost/Projeto_PHP_OO/index.php?pagina=cliente" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Clientes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="https://localhost/Projeto_PHP_OO/index.php?pagina=cliente">Todos clientes</a>
                      <a class="dropdown-item" href="https://localhost/Projeto_PHP_OO/index.php?pagina=cliente&metodo=register">Cadastrar clientes</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="https://localhost/Projeto_PHP_OO/index.php?pagina=produto">Cadastrar produto</a>
                      <a class="dropdown-item" href="https://localhost/Projeto_PHP_OO/index.php?pagina=produto&metodo=listar">Listar produtos</a>
                      <a class="dropdown-item" href="https://localhost/Projeto_PHP_OO/index.php?pagina=pedido&metodo=listar">Pedidos realizados</a>
                    </div>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="https://localhost/Projeto_PHP_OO/index.php?pagina=home&metodo=logout">Sair</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="https://localhost/Projeto_PHP_OO/index.php?pagina=pedido&metodo=pesquisa" method="POST">
                  <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar pedidos pelo seu número..." name="pesquisa" aria-label="Pesquisar" >
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
              </div>
          </nav>
      </header>
    </div>

    <div class="dinamic">
      <div class="box"> 
        {{area dinamica}}
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>