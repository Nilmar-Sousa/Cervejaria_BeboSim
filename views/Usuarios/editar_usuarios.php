<?php 
require_once '../../classes/usuarios.php';
$usuario = new Usuario("cervejaria","localhost","root","");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" >

    <title>Editar o cadastro dos usuários</title>
  </head>
  <body>

  <!-- Função para identificar se a sessão do usuário está ativa ou não -->
  <?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
      header("location: ../../index.php");
      exit;
    }
  ?>

<?php //Retornar os resultado da pesquisa no formulário
  if(isset($_GET['id_update'])){
    $id_update = addslashes($_GET['id_update']);
    $res = $usuario->buscarDadosUsuarios($id_update);
  }
?>

<?php //Atualizar as informações cadastradas
if(isset($_POST['nome'])){
  if(isset($_GET['id_update']) && !empty($_GET['id_update'])){
    $id = addslashes($_GET['id_update']);
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmar_senha = addslashes($_POST['confirmar_senha']);
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmar_senha)) {
        if($senha == $confirmar_senha){
            $usuario->atualizarDados($id, $nome, $telefone, $email, $senha);
            ?>
            <script>alert("Dados do Usuário Atualizados com sucesso!");</script> 
            <?php
        }else{
            ?>
            <script>alert("Senha e Confirmar Senha Não Correspondem!");</script> 
            <?php
         }
    }else {
      ?>
      <script>alert("Preencha Todos os Campos!");</script>
      <?php
    }
    }
}
?>

      <div class="container">
          <div class="row">
              <div class="col">
                <h1>Editar Funcionário</h1>
                <form action="" method="POST">
                  <div class="mb-3">
                   <label for="nome" class="form-label">Nome Completo</label>
                   <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)){echo $res['nome'];} ?>">
                 </div>
                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" class="form-control" name="telefone" required value="<?php if(isset($res)){echo $res['telefone'];} ?>"> 
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required value="<?php if(isset($res)){echo $res['email'];} ?>">
                </div>
                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" class="form-control" name="senha" required value="<?php if(isset($res)){echo $res['senha'];} ?>">
                </div>
                <div class="mb-3">
                  <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                  <input type="password" class="form-control" name="confirmar_senha" required value="<?php if(isset($res)){echo $res['senha'];} ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Salvar Alterações">
               <!-- <button type="submit" class="btn btn-success">Salvar Alterações</button> -->
               <a href="../menu.html" class="btn btn-info">Voltar para o ínicio</a>
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