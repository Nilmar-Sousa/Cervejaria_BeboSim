<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <title>Gerenciamento de Usuários</title>
  </head>

  <!-- Função para identificar se a sessão do usuário está ativa ou não -->

    <?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
      header("location: ../../index.php");
      exit;
    }
    ?>

  <body>
      <div class="container">
          <div class="row">
              <div class="col">
              <div class="jumbotron">
                <h1 class="display-4">Módulo de Usuários</h1>
                <p class="lead">Módulo responsável por fazer o gerenciamento dos Usuários do Sistema.</p>
                <hr class="my-4">
                <p>Acesse as funcionalidades.</p>
                <a class="btn btn-warning btn-lg" href="cadastrar_usuarios.php" role="button">Cadastrar Usuários</a>
                <a class="btn btn-warning btn-lg" href="pesquisar_usuarios.php" role="button">Pesquisar Usuários</a>
                <a class="btn btn-danger btn-lg" href="../../sair.php" role="button">Encerrar Sessão</a>
            </div>
          </div>
      </div>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>