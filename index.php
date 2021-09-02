<?php 
require_once 'classes/usuarios.php';
$usuario = new Usuario("cervejaria","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tela_login.css">

    <title>Login</title>
  </head>
  <body id="fundo">
  <div class="card" id="telaLogin">
  <!-- <img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card"> -->
  <div class="card-body">
  <form method="POST">
  <div class="form-group">
    <label>Login</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Insira seu email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" name="senha" placeholder="Insira sua senha">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Lembrar</label>
  </div>
  <button type="submit" class="btn btn-outline-warning btn-block">Enviar</button>
</form>
  </div>
</div>

<?php
if(isset($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	if(!empty($email) && !empty($senha)) {
			if($usuario->logar($email,$senha)) {
				header("location: views/menu.html");
			}else {
        ?>
        <script>alert("Email ou Senha Estão Incorretos");</script>
        <?php
			}
	}else {
    ?>
    <script>alert("Preencha todos os campos");</script>
    <?php
	}
}
?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>