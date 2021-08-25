<?php 
require_once '../../classes/clientes.php';
$cliente = new Cliente("cervejaria","localhost","root","");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <title>Pesquisar Clientes</title>
  </head>

  <!-- Função para identificar se a sessão do usuário está ativa ou não -->
  <?php/*
  session_start();
  if(!isset($_SESSION['id_usuario'])){
    header("location: ../../index.php");
    exit;
  }*/
  ?>
    <body>
        <div class="container">
          <div class="row">
            <div class="col">
            <h1>Pesquisar</h1>
            <nav class="navbar navbar-light bg-light" >
                <form class="form-inline" action="pesquisar_clientes.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Insira o CNPJ" aria-label="Pesquisar" name="pesquisa">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </nav>
            <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Razão Social</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Email</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th scope="col">Nome do Representante</th>
                <th scope="col">Ações</th>
              </tr>
<?php
  $dados = $cliente->buscarDados();
  if(count($dados) > 0){
    for ($i=0; $i < count($dados); $i++){
      echo "<tr>";
      foreach ($dados[$i] as $key => $value) {
        if($key != "id_cliente"){
          echo "<td>".$value."</td>";
        }
      }
      ?>
        <td witdh=150px><a href='editar_clientes.php?id_update=<?php echo $dados[$i]['id_cliente'];?>' class='btn btn-success btn-sm'>Editar</a>
          <a href='pesquisar_clientes.php?id_cliente=<?php echo $dados[$i]['id_cliente'];?>' class='btn btn-danger btn-sm'>Excluir</a>
        </td>
      <?php
      echo "</tr>";
    } 
  }
?>
            </thead>
            <!-- <tbody> 
              <tr>
                <th scope="row">Nome</th>
                <td>09/08/1988</td>
                <td>888888</td>
                <td>555.555.555-55</td>
                <td>Rua B</td>
                <td>(77) 98888-8888</td>
                <td>l@gmail.com</td>
              </tr>
          </tbody> -->
          </table>
          <a href="gerenciar_clientes.php" class="btn btn-info">Voltar para o ínicio</a>
            </div>
          </div>
        </div>

<?php
  if(isset($_GET['id_cliente'])){
    $id_cliente = addslashes($_GET['id_cliente']);
    $cliente->excluir($id_cliente);
    header("location: pesquisar_clientes.php");
  }
?>
   
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