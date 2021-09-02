<?php 
require_once '../../classes/produtos.php';
$produto = new Produto("cervejaria","localhost","root","");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" >

    <title>Editar o cadastro dos produtos</title>
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
    $res = $produto->buscarDadosProdutos($id_update);
  }
?>

<?php //Atualizar as informações cadastradas
if(isset($_POST['nome'])){
  if(isset($_GET['id_update']) && !empty($_GET['id_update'])){
    $id = addslashes($_GET['id_update']);
    $nome = addslashes($_POST['nome']);
    $qtd_estoque = addslashes($_POST['qtd_estoque']);
    $preco_venda = addslashes($_POST['preco_venda']);
    $percentual_comissao = addslashes($_POST['percentual_comissao']);
    $formula = addslashes($_POST['formula']);
    if(!empty($nome) && !empty($qtd_estoque) && !empty($preco_venda) && !empty($percentual_comissao) && !empty($formula)) {
      $produto->atualizarDados($nome, $qtd_estoque, $preco_venda, $percentual_comissao, $formula);
      ?>
      <script>alert("Dados do Produto Atualizados com sucesso!");</script> 
      <?php
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
                <h1>Editar Produtos</h1>
                <form action="" method="POST">
                  <div class="mb-3">
                   <label for="nome" class="form-label">Nome do Produto</label>
                   <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)){echo $res['nome'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="qtd_estoque" class="form-label">Quantidade em Estoque</label>
                   <input type="text" class="form-control" name="qtd_estoque" required value="<?php if(isset($res)){echo $res['qtd_estoque'];} ?>">
                 </div>
                 <div class="mb-3">
                   <label for="preco_venda" class="form-label">Preço de Venda</label>
                   <input type="text" class="form-control" name="preco_venda" required value="<?php if(isset($res)){echo $res['preco_venda'];} ?>">
                 </div>
                 <div class="mb-3">
                  <label for="percentual_comissao" class="form-label">Percentual de Comissão</label>
                  <input type="text" class="form-control" name="percentual_comissao" required value="<?php if(isset($res)){echo $res['percentual_comissao'];} ?>">
                </div>
                <div class="mb-3">
                  <label for="formula" class="form-label">Fórmula de Produção</label>
                  <input type="text" class="form-control" name="formula" required value="<?php if(isset($res)){echo $res['formula'];} ?>"> 
                </div>
                <input type="submit" class="btn btn-success" value="Salvar Alterações">
               <!-- <button type="submit" class="btn btn-success">Salvar Alterações</button> -->
               <a href="gerenciar_Produtos.php" class="btn btn-info">Voltar para o ínicio</a>
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