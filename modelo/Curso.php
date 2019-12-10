<?php
	
	class Curso{
        private $titulo;
        private $descricao;
        private $local;
        private $quantidadeVagas;
 
		
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		
		public function getTitulo(){
			return $this->titulo;
        }
        
        public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		
		public function getDescricao(){
			return $this->descricao;
        }
        
        public function setLocal($local){
			$this->local = $local;
		}
		
		public function getLocal(){
			return $this->local;
        }
        
        public function setQuantidadeVagas($quantidadeVagas){
			$this->quantidadeVagas = $quantidadeVagas;
		}
		
		public function getQuantidadeVagas(){
			return $this->quantidadeVagas;
		}
	}
?>