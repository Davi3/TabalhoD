<?php

	
	   
	class Configuracoe{
		//Atributos
		private $cod;
 		private $titulo;
 		private $nome;
 		private $slide1;
 		private $slide2;
 		private $frase1;
 		private $frase2;
 		private $subf1;
 		private $subf2;
 		private $bt1;
 		private $bt2;
 		private $local;
 		private $tel;
 		private $email;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSlide1(){
			return $this->slide1;
		}
		public function getSlide2(){
			return $this->slide2;
		}
		public function getFrase1(){
			return $this->frase1;
		}
		public function getFrase2(){
			return $this->frase2;
		}
		public function getSubf1(){
			return $this->subf1;
		}
		public function getSubf2(){
			return $this->subf2;
		}
		public function getBt1(){
			return $this->bt1;
		}
		public function getBt2(){
			return $this->bt2;
		}
		public function getLocal(){
			return $this->local;
		}
		public function getTel(){
			return $this->tel;
		}
		public function getEmail(){
			return $this->email;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setTitulo($titulo){
			$this->titulo=$titulo;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setSlide1($slide1){
			$this->slide1=$slide1;
		}
		public function setSlide2($slide2){
			$this->slide2=$slide2;
		}
		public function setFrase1($frase1){
			$this->frase1=$frase1;
		}
		public function setFrase2($frase2){
			$this->frase2=$frase2;
		}
		public function setSubf1($subf1){
			$this->subf1=$subf1;
		}
		public function setSubf2($subf2){
			$this->subf2=$subf2;
		}
		public function setBt1($bt1){
			$this->bt1=$bt1;
		}
		public function setBt2($bt2){
			$this->bt2=$bt2;
		}
		public function setLocal($local){
			$this->local=$local;
		}
		public function setTel($tel){
			$this->tel=$tel;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		
	}
?>