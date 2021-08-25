<?php   
   
Class Cliente {
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

    public function cadastrar($razao_social, $cnpj, $email, $endereco, $telefone, $nome_representante){
		//verificar se já existe o email cadastrado
		$sql = $this->pdo->prepare("SELECT id_cliente FROM clientes WHERE cnpj = :cnpj");
		$sql->bindValue(":cnpj",$cnpj);
		$sql->execute();
		if($sql->rowCount() > 0){
			return false; //ja esta cadastrado
		}else {
			//caso nao, Cadastrar
			$sql = $this->pdo->prepare("INSERT INTO clientes (razao_social, cnpj, email, endereco, telefone, nome_representante) VALUES (:razao_social, :cnpj, :email, :endereco, :telefone, :nome_representante)");
			$sql->bindValue(":razao_social",$razao_social);
            $sql->bindValue(":cnpj",$cnpj);
            $sql->bindValue("email",$email);
            $sql->bindValue(":endereco",$endereco);
			$sql->bindValue(":telefone",$telefone);
			$sql->bindValue(":nome_representante",$nome_representante);
			$sql->execute();
			return true; //tudo ok
		}
	}

	public function buscarDados(){
		$res = array();
		$sql = $this->pdo->query("SELECT * FROM clientes ORDER BY razao_social");
		$res = $sql->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	public function excluir($id_cliente){
		$sql = $this->pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id");
		$sql->bindValue("id",$id_funcionario);
		$sql->execute();
	}

	public function buscarDadosClientes($id_cliente){
		$res = array();
		$sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
		$sql->bindValue(":id",$id_cliente);
		$sql->execute();
		$res = $sql->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function atualizarDados($id, $razao_social, $cnpj, $email, $endereco, $telefone, $nome_representante){
		$sql = $this->pdo->prepare("UPDATE clientes SET razao_social = :razao_social, cnpj = :cnpj, email = :email, endereco = :endereco, telefone = :telefone, nome_representante = :nome_representante WHERE id_cliente = :id");
        $sql->bindValue(":razao_social",$razao_social);
        $sql->bindValue(":cnpj",$cnpj);
        $sql->bindValue("email",$email);
        $sql->bindValue(":endereco",$endereco);
        $sql->bindValue(":telefone",$telefone);
        $sql->bindValue(":nome_representante",$nome_representante);
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