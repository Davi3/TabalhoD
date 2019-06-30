<?php

	
	   
class ConfiguracoeDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM configuracoes WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../conexao.php");
		$sql = 'SELECT * FROM configuracoes';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM configuracoes ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM configuracoes WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($configuracoe){
		include("../conexao.php");
		$sql = 'INSERT INTO configuracoes (cod, titulo, nome, slide1, slide2, frase1, frase2, subf1, subf2, bt1, bt2, local, tel, email) VALUES (:cod, :titulo, :nome, :slide1, :slide2, :frase1, :frase2, :subf1, :subf2, :bt1, :bt2, :local, :tel, :email)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$configuracoe->getCod()); 
		$consulta->bindValue(':titulo',$configuracoe->getTitulo()); 
		$consulta->bindValue(':nome',$configuracoe->getNome()); 
		$consulta->bindValue(':slide1',$configuracoe->getSlide1()); 
		$consulta->bindValue(':slide2',$configuracoe->getSlide2()); 
		$consulta->bindValue(':frase1',$configuracoe->getFrase1()); 
		$consulta->bindValue(':frase2',$configuracoe->getFrase2()); 
		$consulta->bindValue(':subf1',$configuracoe->getSubf1()); 
		$consulta->bindValue(':subf2',$configuracoe->getSubf2()); 
		$consulta->bindValue(':bt1',$configuracoe->getBt1()); 
		$consulta->bindValue(':bt2',$configuracoe->getBt2()); 
		$consulta->bindValue(':local',$configuracoe->getLocal()); 
		$consulta->bindValue(':tel',$configuracoe->getTel()); 
		$consulta->bindValue(':email',$configuracoe->getEmail()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($configuracoe){
		include("../conexao.php");
		$sql = 'UPDATE configuracoes SET cod = :cod, titulo = :titulo, nome = :nome, slide1 = :slide1, slide2 = :slide2, frase1 = :frase1, frase2 = :frase2, subf1 = :subf1, subf2 = :subf2, bt1 = :bt1, bt2 = :bt2, local = :local, tel = :tel, email = :email WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$configuracoe->getCod()); 
		$consulta->bindValue(':titulo',$configuracoe->getTitulo()); 
		$consulta->bindValue(':nome',$configuracoe->getNome()); 
		$consulta->bindValue(':slide1',$configuracoe->getSlide1()); 
		$consulta->bindValue(':slide2',$configuracoe->getSlide2()); 
		$consulta->bindValue(':frase1',$configuracoe->getFrase1()); 
		$consulta->bindValue(':frase2',$configuracoe->getFrase2()); 
		$consulta->bindValue(':subf1',$configuracoe->getSubf1()); 
		$consulta->bindValue(':subf2',$configuracoe->getSubf2()); 
		$consulta->bindValue(':bt1',$configuracoe->getBt1()); 
		$consulta->bindValue(':bt2',$configuracoe->getBt2()); 
		$consulta->bindValue(':local',$configuracoe->getLocal()); 
		$consulta->bindValue(':tel',$configuracoe->getTel()); 
		$consulta->bindValue(':email',$configuracoe->getEmail()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public function confirma($nome){
		include("../conexao.php");
		$sql = 'SELECT * FROM configuracoes WHERE nome = :nome';
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


	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM configuracoes';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>