<?php

	   
class ProdutoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM produto WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto';
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

	public function listarByCod_cat($cod_cat){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto WHERE cod_cat ='.$cod_cat;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM produto ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../conexao.php");
		$sql = 'DELETE FROM produto WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	public function deletarCat($cod_cat){
		include("../conexao.php");
		$sql = 'DELETE FROM produto WHERE cod_cat = :cod_cat';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod_cat",$cod_cat);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($produto){
		include("../conexao.php");
		$sql = 'INSERT INTO produto (nome, descricao, preco, imagem, principal) VALUES ( :nome, :descricao, :preco, :imagem, :principal)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':nome',$produto->getNome()); 
		$consulta->bindValue(':descricao',$produto->getDescricao()); 
		$consulta->bindValue(':preco',$produto->getPreco()); 
		$consulta->bindValue(':imagem',$produto->getImagem()); 
		$consulta->bindValue(':principal',$produto->getPrincipal()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	public function inserirCod($produto){
		include("../conexao.php");
		$sql = 'UPDATE produto SET cod_cat = :cod_cat, cod = :cod WHERE cod =:cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod_cat',$produto->getCod_cat());
		$consulta->bindValue(':cod',$produto->getCod());  
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public function confirma($nome){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto WHERE nome = :nome';
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
	public function confirmaCat($cod_cat, $cod){
		include("../conexao.php");
		$sql = 'SELECT * FROM produto_categoria WHERE cod_cat = :cod_cat and cod = :cod';
		$consulta = $consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod_cat', $cod_cat);
		$consulta->bindValue(':cod', $cod);
		$consulta->execute();
		$count = $consulta->fetchColumn();
		if($count >0 ){
			return false;
		}else{
			return true;
		}
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($produto){
		include("../conexao.php");
		$sql = 'UPDATE produto SET cod = :cod, nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem, principal = :principal WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$produto->getCod()); 
		$consulta->bindValue(':nome',$produto->getNome()); 
		$consulta->bindValue(':descricao',$produto->getDescricao()); 
		$consulta->bindValue(':preco',$produto->getPreco()); 
		$consulta->bindValue(':imagem',$produto->getImagem()); 
		$consulta->bindValue(':principal',$produto->getPrincipal()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM produto';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>