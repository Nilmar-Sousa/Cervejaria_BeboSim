<?php   
   
Class Produto {
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

    public function cadastrar($nome, $qtd_estoque, $preco_venda, $percentual_comissao, $formula){
		//verificar se já existe o email cadastrado
		$sql = $this->pdo->prepare("SELECT id_produto FROM produtos WHERE nome = :nome");
		$sql->bindValue(":nome",$nome);
		$sql->execute();
		if($sql->rowCount() > 0){
			return false; //ja esta cadastrado
		}else {
			//caso nao, Cadastrar
			$sql = $this->pdo->prepare("INSERT INTO produtos (nome, qtd_estoque, preco_venda, percentual_comissao, formula) VALUES (:nome, :qtd_estoque, :preco_venda, :percentual_comissao, :formula)");
			$sql->bindValue(":nome",$nome);
            $sql->bindValue(":qtd_estoque",$qtd_estoque);
            $sql->bindValue("preco_venda",$preco_venda);
            $sql->bindValue(":percentual_comissao",$percentual_comissao);
			$sql->bindValue(":formula",$formula);
			$sql->execute();
			return true; //tudo ok
		}
	}

	public function buscarDados(){
		$res = array();
		$sql = $this->pdo->query("SELECT * FROM produtos ORDER BY nome");
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function excluir($id_produto){
		$sql = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
		$sql->bindValue("id",$id_produto);
		$sql->execute();
	}

	public function buscarDadosProdutos($id_produto){
		$res = array();
		$sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id_ produto = :id");
		$sql->bindValue(":id",$id_produto);
		$sql->execute();
		$res = $sql->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function atualizarDados($id, $nome, $qtd_estoque, $preco_venda, $percentual_comissao, $formula){
		$sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, qtd_estoque = :qtd_estoque, preco_venda = :preco_venda, percentual_comissao = :percentual_comissao, formula = :formula WHERE id_produto = :id");
		$sql->bindValue(":nome",$nome);
		$sql->bindValue(":qtd_estoque",$qtd_estoque);
		$sql->bindValue("preco_venda",$preco_venda);
		$sql->bindValue(":percentual_comissao",$percentual_comissao);
		$sql->bindValue(":formula",$formula);
		$sql->bindValue(":id",$id);
		$sql->execute();
	}

	public function mostrar_data($data){
		$d = explode('-', $data);
		$escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
		return $escreve;	
	}
}
?>