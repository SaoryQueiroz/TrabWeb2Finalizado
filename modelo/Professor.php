<?php
	require_once 'Pessoa.php';
	
	class Professor extends Pessoa{
		private $siape;
		
		public function setSIAPE($siape){
			$this->siape = $siape;
		}
		
		public function getSIAPE(){
			return $this->siape;
		}
	}
?>