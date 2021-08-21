<?php

Class Produtos
{
	private $pdo;
	public $msgErro = "";//tudo ok

	public function conectar($nome, $host, $usuario, $senha){
		global $pdo;
		try {
			$pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function cadastrar($nome, $qtd_estoque, $preco_venda, $percentual_comissao, $formula_producao){
		global $pdo;
		//verificar se já existe o email cadastrado
		$sql = $pdo->prepare("SELECT id_produto FROM produtos WHERE nome = :nome");
		$sql->bindValue(":nome",$nome);
		$sql->execute();
		if($sql->rowCount() > 0){
			return false; //ja esta cadastrado
		}else {
			//caso nao, Cadastrar
			$sql = $pdo->prepare("INSERT INTO produtos (nome, qtd_estoque, preco_venda, percentual_comissao, formula_producao) VALUES (:nome, :qtd_estoque, :preco_venda, :percentual_comissao, :formula_producao)");
			$sql->bindValue(":nome",$nome);
            $sql->bindValue(":qtd_estoque",$qtd_estoque);
            $sql->bindValue("preco_venda",$preco_venda);
            $sql->bindValue(":percentual_comissao",$percentual_comissao);
            $sql->bindValue(":formula_producao",$formula_producao);
			$sql->execute();
			return true; //tudo ok
		}
	}

    public function excluir($id){
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }
}
?>