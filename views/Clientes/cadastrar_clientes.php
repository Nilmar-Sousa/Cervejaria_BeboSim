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

    <title>Cadastro de Clientes</title>
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
                <h1>Cadastro de Cliente</h1>
                <form method="POST">
                  <div class="mb-3">
                   <label for="razao_social" class="form-label">Razão Social</label>
                   <input type="text" class="form-control" name="razao_social" required>
                 </div>
                 <div class="mb-3">
                   <label for="cnpj" class="form-label">CNPJ</label>
                   <input type="text" id="cnpj" class="form-control" name="cnpj" required>
                 </div>
                 <div class="mb-3">
                   <label for="email" class="form-label">Email</label>
                   <input type="email" class="form-control" name="email" required>
                 </div>
                 <div class="mb-3">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco">
                </div>
                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" id="telefone" class="form-control" name="telefone">
                </div>
                <div class="mb-3">
                  <label for="nome_representante" class="form-label">Nome do Representante</label>
                  <input type="text" class="form-control" name="nome_representante">
                </div>
               <button type="submit" class="btn btn-success">Cadastrar</button>
               <a href="../menu.html" class="btn btn-info">Voltar para o ínicio</a>
                </div>
                </form>
              </div>
          </div>
      </div>

<?php
if(isset($_POST['razao_social'])){
    $razao_social = addslashes($_POST['razao_social']);
    $cnpj = addslashes($_POST['cnpj']);
    $email = addslashes($_POST['email']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $nome_representante = addslashes($_POST['nome_representante']);
    if(!empty($razao_social) && !empty($cnpj) && !empty($email) && !empty($endereco) && !empty($telefone) && !empty($nome_representante)) {
      if($cliente->cadastrar($razao_social, $cnpj, $email, $endereco, $telefone, $nome_representante)){
        ?>
        <script>alert("Cliente Cadastrado com Sucesso!");</script>
        <?php
      }else{
        ?>
        <script>alert("Cliente Já Possui Cadastro no Sistema!");</script>
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

    <script type="text/javascript">
    $("#cnpj").mask("00.000.000/0000-00")
    $("#telefone").mask("(00) 0000-0000")
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>