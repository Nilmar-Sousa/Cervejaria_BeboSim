<?php

Class Usuario {
    public function __construct($dbname, $host, $user, $senha){
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        } catch (PDOException $e) {
            echo "Erro com banco de dados: ".$e->getMessage();
            exit();
        }catch (Exception $e){
            echo "Erro generico: ".$e->getMessage();
            exit();
        }
    }

	public function cadastrar($nome, $telefone, $email, $senha){
		$sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
		$sql->bindValue(":email",$email);
		$sql->execute();
		if($sql->rowCount() > 0){
			return false; 
		}else {
			$sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)");
			$sql->bindValue(":nome",$nome);
			$sql->bindValue(":telefone",$telefone);
			$sql->bindValue(":email",$email);
			$sql->bindValue(":senha",md5($senha));
			$sql->execute();
			return true; 
		}
	}

	public function buscarDados(){
		$res = array();
		$sql = $this->pdo->query("SELECT * FROM usuarios ORDER BY nome");
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function excluir($id_usuario){
		$sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
		$sql->bindValue("id",$id_usuario);
		$sql->execute();
	}

	public function buscarDadosUsuarios($id_usuario){
		$res = array();
		$sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
		$sql->bindValue(":id",$id_usuario);
		$sql->execute();
		$res = $sql->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function atualizarDados($id, $nome, $telefone, $email, $senha){
		$sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id_usuarios = :id");
		$sql->bindValue(":nome",$nome);
		$sql->bindValue(":telefone",$telefone);
		$sql->bindValue(":email",$email);
		$sql->bindValue(":senha",md5($senha));
		$sql->bindValue(":id",$id);
		$sql->execute();
	}

	public function logar($email, $senha){
		$sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email",$email);
		$sql->bindValue(":senha",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0){
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			return true; 
		}else {
			return false;
		}
	}
}
?>