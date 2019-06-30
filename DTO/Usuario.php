<?php

	   
	class Usuario{
		//Atributos
		private $cod;
 		private $tipo;
 		private $email;
 		private $senha;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setTipo($tipo){
			$this->tipo=$tipo;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		
	}
?>