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
    

    <title>Cadastro de Funcionário</title>
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
                <h1>Cadastro de Funcionário</h1>
                <form method="POST">
                  <div class="mb-3">
                   <label for="nome" class="form-label">Nome Completo</label>
                   <input type="text" class="form-control" name="nome" required>
                 </div>
                 <div class="mb-3">
                   <label for="data_admissao" class="form-label">Data de Admissão</label>
                   <input type="date" class="form-control" name="data_admissao" required>
                 </div>
                 <div class="mb-3">
                   <label for="numero_ctps" class="form-label">Número da Carteira de Trabalho</label>
                   <input type="text" class="form-control" name="numero_ctps" required maxlength="8">
                 </div>
                 <div class="mb-3">
                   <label for="cpf" class="form-label">CPF</label>
                   <input type="text" id="cpf" class="form-control" name="cpf" required>
                 </div>
                 <div class="mb-3">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco" required>
                </div>
                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" id="telefone" class="form-control" name="telefone" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
               <button type="submit" class="btn btn-success">Cadastrar</button>
               <a href="../menu.html" class="btn btn-warning">Voltar para o ínicio</a>
                </div>
                </form>
              </div>
          </div>
      </div>

<?php
if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $data_admissao = addslashes($_POST['data_admissao']);
    $numero_ctps = addslashes($_POST['numero_ctps']);
    $cpf = addslashes($_POST['cpf']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    if(!empty($nome) && !empty($data_admissao) && !empty($numero_ctps) && !empty($cpf) && !empty($endereco) && !empty($telefone) && !empty($email)) {
      if($funcionario->cadastrar($nome,$data_admissao,$numero_ctps,$cpf,$endereco,$telefone,$email)){
        ?>
        <script>alert("Funcionário Cadastrado com Sucesso!");</script>
        <?php
      }else{
        ?>
        <script>alert("Funcionário Já Possui Cadastro no Sistema!");</script>
        <?php
      }
    }else {
        ?>
        <script>alert("Preencha Todos os Campos!");</script>
        <?php
    }
}
?>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../../bootstrap/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/jquery.mask.min.js"></script>

    <!-- Máscaras utilizadas nos inputs -->
    <script type="text/javascript">
    $("#cpf").mask("000.000.000-00")
    $("#telefone").mask("(00) 0000-0000")
    </script>
    <!-- </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>