<?php

	   
	class Categoria{
		//Atributos
		private $cod;
 		private $nome;
 		private $imagem;
 		private $descricao;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getImagem(){
			return $this->imagem;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setImagem($imagem){
			$this->imagem=$imagem;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		
	}
?>