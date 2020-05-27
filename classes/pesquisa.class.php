<?php
class Pesquisa{

	public function getListaPesquisaBairro() {
		$array = array();
		global $pdo;

		$sql = $pdo->query("SELECT DISTINCT bairro FROM anuncios GROUP BY bairro");
		if($sql->rowCount()> 0)
                    
                 $array = $sql->fetchAll();                     
             

                return $array;
	}
        public function getListaPesquisauf() {
		$array = array();
		global $pdo;

		$sql = $pdo->query("SELECT DISTINCT uf FROM anuncios GROUP BY uf");
		if($sql->rowCount()> 0)
                    
                 $array = $sql->fetchAll();                     
             

                return $array;
	}
        public function getListaPesquisaCidade() {
		$array = array();
		global $pdo;

		$sql = $pdo->query("SELECT DISTINCT cidade FROM anuncios GROUP BY cidade");
		if($sql->rowCount()> 0)
                    
                 $array = $sql->fetchAll();                     
             

                return $array;
	}
        
        

        
}
?>
