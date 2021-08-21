<?php   
   
Class Funcionario {
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

    public function cadastrar($nome, $data_admissao, $numero_ctps, $cpf, $endereco, $telefone, $email){
		//verificar se já existe o email cadastrado
		$sql = $this->pdo->prepare("SELECT id_funcionario FROM funcionarios WHERE cpf = :cpf");
		$sql->bindValue(":cpf",$cpf);
		$sql->execute();
		if($sql->rowCount() > 0){
			return false; //ja esta cadastrado
		}else {
			//caso nao, Cadastrar
			$sql = $this->pdo->prepare("INSERT INTO funcionarios (nome, data_admissao, numero_ctps, cpf, endereco, telefone, email) VALUES (:nome, :data_admissao, :numero_ctps, :cpf, :endereco, :telefone, :email)");
			$sql->bindValue(":nome",$nome);
            $sql->bindValue(":data_admissao",$data_admissao);
            $sql->bindValue("numero_ctps",$numero_ctps);
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":endereco",$endereco);
			$sql->bindValue(":telefone",$telefone);
			$sql->bindValue(":email",$email);
			$sql->execute();
			return true; //tudo ok
		}
	}

	public function buscarDados(){
		$res = array();
		$sql = $this->pdo->query("SELECT * FROM funcionarios ORDER BY nome");
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function excluir($id_funcionario){
		$sql = $this->pdo->prepare("DELETE FROM funcionarios WHERE id_funcionario = :id");
		$sql->bindValue("id",$id_funcionario);
		$sql->execute();
	}

	public function buscarDadosFuncionario($id_funcionario){
		$res = array();
		$sql = $this->pdo->prepare("SELECT * FROM funcionarios WHERE id_funcionario = :id");
		$sql->bindValue(":id",$id_funcionario);
		$sql->execute();
		$res = $sql->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function atualizarDados($id, $nome, $data_admissao, $numero_ctps, $cpf, $endereco, $telefone, $email){
		$sql = $this->pdo->prepare("UPDATE funcionarios SET nome = :nome, data_admissao = :data_admissao, numero_ctps = :numero_ctps, cpf = :cpf, endereco = :endereco, telefone = :telefone, email = :email WHERE id_funcionario = :id");
		$sql->bindValue(":nome",$nome);
		$sql->bindValue(":data_admissao",$data_admissao);
		$sql->bindValue(":numero_ctps",$numero_ctps);
		$sql->bindValue(":cpf",$cpf);
		$sql->bindValue(":endereco",$endereco);
		$sql->bindValue(":telefone",$telefone);
		$sql->bindValue(":email",$email);
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