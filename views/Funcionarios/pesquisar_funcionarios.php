<?php 
require_once '../../classes/funcionarios.php';
$funcionario = new Funcionario("cervejaria","localhost","root","");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <title>Pesquisar Funcionários</title>
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
            <h1>Pesquisar</h1>
            <nav class="navbar navbar-light bg-light" >
                <form class="form-inline" action="pesquisar_funcionarios.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Insira o CPF" aria-label="Pesquisar" name="pesquisa">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </nav>
            <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data de Admissão</th>
                <th scope="col">Número da CTPS</th>
                <th scope="col">CPF</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
              </tr>
              <?php
                $dados = $funcionario->buscarDados();
                if(count($dados) > 0){
                  for ($i=0; $i < count($dados); $i++){
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $value) {
                      if($key != "id_funcionario"){
                        echo "<td>".$value."</td>";
                      }
                    }
                    ?>
                      <td witdh=150px><a href='editar_funcionarios.php?id_update=<?php echo $dados[$i]['id_funcionario'];?>' class='btn btn-success btn-sm'>Editar</a>
                      <a href='pesquisar_funcionarios.php?id_funcionario=<?php echo $dados[$i]['id_funcionario'];?>' class='btn btn-danger btn-sm'>Excluir</a> 
                      </td>
                    <?php
                    echo "</tr>";
                  } 
                }
              ?>
            </thead>
          </table>
          <a href="../menu.html".php" class="btn btn-warning">Voltar para o ínicio</a>
            </div>
          </div>
        </div>

<!-- Função para Excluir o Funcionario -->
<?php 
  if(isset($_GET['id_funcionario'])){
    $id_funcionario = addslashes($_GET['id_funcionario']);
    $funcionario->excluir($id_funcionario);
    header("location: pesquisar_funcionarios.php");
  } 
?>

        <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>