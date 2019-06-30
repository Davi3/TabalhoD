<?php

	   
class CategoriaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM categoria WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../conexao.php");
		$sql = 'SELECT * FROM categoria';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	public function listarByCod($cod){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto WHERE `cod` = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod', $cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM categoria ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../conexao.php");
		$sql = 'DELETE FROM categoria WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($categoria){
		include("../conexao.php");
		$sql = 'INSERT INTO categoria (nome, imagem, descricao) VALUES (:nome, :imagem, :descricao)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':nome',$categoria->getNome()); 
		$consulta->bindValue(':imagem',$categoria->getImagem()); 
		$consulta->bindValue(':descricao',$categoria->getDescricao()); 
		if($consulta->execute())
			return false;
		else
			return true;
	}
	public function confirma($nome){
		include("../conexao.php");
		$sql = 'SELECT * FROM categoria WHERE nome = :nome';
		$consulta = $consulta = $conexao->prepare($sql);
		$consulta->bindValue(':nome', $nome);
		$consulta->execute();
		$count = $consulta->fetchColumn();
		if($count >0 ){
			return false;
		}else{
			return true;
		}
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($categoria){
		include("../conexao.php");
		$sql = 'UPDATE categoria SET cod = :cod, nome = :nome, descricao = :descricao WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$categoria->getCod()); 
		$consulta->bindValue(':nome',$categoria->getNome());  
		$consulta->bindValue(':descricao',$categoria->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM categoria';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>