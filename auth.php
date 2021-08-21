<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
    header("location: views/Funcionarios/gerenciar_funcionarios.php");
?>

<!-- SEJA BEM VINDO! -->
<!-- <a href="sair.php"> SAIR </a> -->