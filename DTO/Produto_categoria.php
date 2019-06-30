<?php

	
	   
	class Produto_categoria{
		//Atributos
		private $cod_cat;
 		private $cod_prod;
 		private $cod;
 				
		//Métodos Getters e Setters
		public function getCod_cat(){
			return $this->cod_cat;
		}
		public function getCod_prod(){
			return $this->cod_prod;
		}
		public function getCod(){
			return $this->cod;
		}
		
		public function setCod_cat($cod_cat){
			$this->cod_cat=$cod_cat;
		}
		public function setCod_prod($cod_prod){
			$this->cod_prod=$cod_prod;
		}
		public function setCod($cod){
			$this->cod=$cod;
		}
		
	}
?>