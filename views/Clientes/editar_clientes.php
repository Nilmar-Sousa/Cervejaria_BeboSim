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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" >

    <title>Editar o cadastro dos clientes</title>
  </head>
  <body>

  <!-- Função para identificar se a sessão do usuário está ativa ou não -->
  <?php/*
    session_start();
    if(!isset($_SESSION['id_usuario'])){
      header("location: ../../index.php");
      exit;
    }*/
  ?>

<?php //Retornar os resultado da pesquisa no formulário
  if(isset($_GET['id_update'])){
    $id_update = addslashes($_GET['id_update']);
    $res = $funcionario->buscarDadosClientes($id_update);
  }
?>

<?php //Atualizar as informações cadastradas
if(isset($_POST['razao_social'])){
  if(isset($_GET['id_update']) && !empty($_GET['id_update'])){
    $id = addslashes($_GET['id_update']);
    $razao_social = addslashes($_POST['razao_social']);
    $cnpj = addslashes($_POST['cnpj']);
    $email = addslashes($_POST['email']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $nome_representante = addslashes($_POST['nome_representante']);
    if(!empty($razao_social) && !empty($cnpj) && !empty($email) && !empty($endereco) && !empty($telefone) && !empty($nome_representante)) {
      $cliente->atualizarDados($razao_social, $cnpj, $email, $endereco, $telefone, $nome_representante);
      header("location: gerenciar_clientes.php");
        ?>
        <div id="msg-sucesso"> 
        Dados do Cliente Atualizados com sucesso!
        </div>
        <?php
    }else {
        ?>
        <div class="msg-erro">
        Preencha todos os campos
        </div>
        <?php
      }
  }
}
?>

      <div class="container">
          <div class="row">
              <div class="col">
                <h1>Editar Cliente</h1>
                <form action="" method="POST">
                  <div class="mb-3">
                   <label for="razao_social" class="form-label">Razão Social</label>
                   <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)){echo $res['razao_social'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="cnpj" class="form-label">CNPJ</label>
                   <input type="text" class="form-control" name="cnpj" required value="<?php if(isset($res)){echo $res['cnpj'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="email" class="form-label">Email</label>
                   <input type="email" class="form-control" name="email" required value="<?php if(isset($res)){echo $res['email'];} ?>">
                 </div>
                 <div class="mb-3">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco" required value="<?php if(isset($res)){echo $res['endereco'];} ?>">
                </div>
                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" class="form-control" name="telefone" required value="<?php if(isset($res)){echo $res['telefone'];} ?>"> 
                </div>
                <div class="mb-3">
                  <label for="nome_representante" class="form-label">Nome Representante</label>
                  <input type="text" class="form-control" name="nome_representante" required value="<?php if(isset($res)){echo $res['nome_representante'];} ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Salvar Alterações">
               <!-- <button type="submit" class="btn btn-success">Salvar Alterações</button> -->
               <a href="gerenciar_clientes.php" class="btn btn-info">Voltar para o ínicio</a>
                </div>
                </form>
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