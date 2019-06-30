<?php

	
	   
class Produto_categoriaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM produto_categoria WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto_categoria';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM produto_categoria ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod_prod){
		include("../conexao.php");
		$sql = 'DELETE FROM produto_categoria WHERE cod_prod = :cod_prod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod_prod",$cod_prod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($produto_categoria){
		include("../conexao.php");
		$sql = 'INSERT INTO produto_categoria (cod_cat, cod_prod) VALUES (:cod_cat, :cod_prod)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod_cat',$produto_categoria->getCod_cat()); 
		$consulta->bindValue(':cod_prod',$produto_categoria->getCod_prod()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	public function confirma($cod_cat, $cod_prod){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto_categoria WHERE cod_cat = :cod_cat and cod_prod = :cod_prod';
		$consulta = $consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod_cat', $cod_cat);
		$consulta->bindValue(':cod_prod', $cod_prod);
		$consulta->execute();
		$count = $consulta->fetchColumn();
		if($count >0 ){
			return false;
		}else{
			return true;
		}
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($produto_categoria){
		include("conexao.php");
		$sql = 'UPDATE produto_categoria SET cod_cat = :cod_cat, cod_prod = :cod_prod, cod = :cod WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod_cat',$produto_categoria->getCod_cat()); 
		$consulta->bindValue(':cod_prod',$produto_categoria->getCod_prod()); 
		$consulta->bindValue(':cod',$produto_categoria->getCod()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM produto_categoria';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>