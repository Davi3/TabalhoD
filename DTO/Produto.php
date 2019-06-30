<?php

	
	   
	class Produto{
		//Atributos
		private $cod;
		private $cod_cat;
 		private $nome;
 		private $descricao;
 		private $preco;
 		private $imagem;
 		private $principal;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getCod_cat(){
			return $this->cod_cat;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function getPreco(){
			return $this->preco;
		}
		public function getImagem(){
			return $this->imagem;
		}
		public function getPrincipal(){
			return $this->principal;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setCod_cat($cod_cat){
			$this->cod_cat=$cod_cat;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		public function setPreco($preco){
			$this->preco=$preco;
		}
		public function setImagem($imagem){
			$this->imagem=$imagem;
		}
		public function setPrincipal($principal){
			$this->principal=$principal;
		}
		
	}
?>