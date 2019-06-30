<?php

	
	   
class UsuarioDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM usuario WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("conexao.php");
		$sql = 'SELECT * FROM usuario';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM usuario ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM usuario WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($usuario){
		include("conexao.php");
		$sql = 'INSERT INTO usuario (cod, tipo, email, senha) VALUES (:cod, :tipo, :email, :senha)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$usuario->getCod()); 
		$consulta->bindValue(':tipo',$usuario->getTipo()); 
		$consulta->bindValue(':email',$usuario->getEmail()); 
		$consulta->bindValue(':senha',$usuario->getSenha()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public function logar($usuario){
		include("../conexao.php");
		$sql = 'SELECT * FROM usuario where email = :email and senha = :senha';
		$consulta = $conexao->prepare($sql); 
		$consulta->bindValue(':email',$usuario->getEmail());
		$consulta->bindValue(':senha',$usuario->getSenha());
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		return $resultado;

	}
	//Atualiza um elemento na tabela
	public function atualizar($usuario){
		include("conexao.php");
		$sql = 'UPDATE usuario SET cod = :cod, tipo = :tipo, email = :email, senha = :senha WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$usuario->getCod()); 
		$consulta->bindValue(':tipo',$usuario->getTipo()); 
		$consulta->bindValue(':email',$usuario->getEmail()); 
		$consulta->bindValue(':senha',$usuario->getSenha()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM usuario';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>