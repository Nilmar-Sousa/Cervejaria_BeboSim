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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" >

    <title>Editar o cadastro dos funcionários</title>
  </head>
  <body>

<?php //Retornar os resultado da pesquisa no formulário
  if(isset($_GET['id_update'])){
    $id_update = addslashes($_GET['id_update']);
    $res = $funcionario->buscarDadosFuncionario($id_update);
  }
?>

<?php //Atualizar as informações cadastradas
if(isset($_POST['nome'])){
  if(isset($_GET['id_update']) && !empty($_GET['id_update'])){
    $id = addslashes($_GET['id_update']);
    $nome = addslashes($_POST['nome']);
    $data_admissao = addslashes($_POST['data_admissao']);
    $numero_ctps = addslashes($_POST['numero_ctps']);
    $cpf = addslashes($_POST['cpf']);
    $endereco = addslashes($_POST['endereco']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    if(!empty($nome) && !empty($data_admissao) && !empty($numero_ctps) && !empty($cpf) && !empty($endereco) && !empty($telefone) && !empty($email)) {
      $funcionario->atualizarDados($id, $nome, $data_admissao, $numero_ctps, $cpf, $endereco, $telefone, $email);
      header("location: ../views/gerenciar_funcionarios.php");
        ?>
        <div id="msg-sucesso"> 
        Dados do Funcionário Atualizados com sucesso!
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
                <h1>Editar Funcionário</h1>
                <form action="" method="POST">
                  <div class="mb-3">
                   <label for="nome" class="form-label">Nome Completo</label>
                   <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)){echo $res['nome'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="data_admissao" class="form-label">Data de Admissão</label>
                   <input type="date" class="form-control" name="data_admissao" required value="<?php if(isset($res)){echo $res['data_admissao'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="numero_ctps" class="form-label">Número da Carteira de Trabalho</label>
                   <input type="text" class="form-control" name="numero_ctps" required value="<?php if(isset($res)){echo $res['numero_ctps'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="cpf" class="form-label">CPF</label>
                   <input type="text" class="form-control" name="cpf" required value="<?php if(isset($res)){echo $res['cpf'];} ?>">
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
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required value="<?php if(isset($res)){echo $res['email'];} ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Salvar Alterações">
               <!-- <button type="submit" class="btn btn-success">Salvar Alterações</button> -->
               <a href="../views/gerenciar_funcionarios.php" class="btn btn-info">Voltar para o ínicio</a>
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