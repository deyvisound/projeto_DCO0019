<?php
/**
 * Class that operate on table 'obra'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class ObraMySqlDAO implements ObraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ObraMySql 
	 */
	public function load($idobra, $ideditora, $idautor, $idassunto){
		$sql = 'SELECT * FROM obra WHERE idobra = ?  AND ideditora = ?  AND idautor = ?  AND idassunto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idobra);
		$sqlQuery->setNumber($ideditora);
		$sqlQuery->setNumber($idautor);
		$sqlQuery->setNumber($idassunto);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM obra';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM obra ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param obra primary key
 	 */
	public function delete($idobra, $ideditora, $idautor, $idassunto){
		$sql = 'DELETE FROM obra WHERE idobra = ?  AND ideditora = ?  AND idautor = ?  AND idassunto = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idobra);
		$sqlQuery->setNumber($ideditora);
		$sqlQuery->setNumber($idautor);
		$sqlQuery->setNumber($idassunto);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ObraMySql obra
 	 */
	public function insert($obra){
		$sql = 'INSERT INTO obra (titulo, ano_publicacao, idobra, ideditora, idautor, idassunto) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($obra->titulo);
		$sqlQuery->set($obra->anoPublicacao);

		
		$sqlQuery->setNumber($obra->idobra);

		$sqlQuery->setNumber($obra->ideditora);

		$sqlQuery->setNumber($obra->idautor);

		$sqlQuery->setNumber($obra->idassunto);

		$this->executeInsert($sqlQuery);	
		//$obra->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ObraMySql obra
 	 */
	public function update($obra){
		$sql = 'UPDATE obra SET titulo = ?, ano_publicacao = ? WHERE idobra = ?  AND ideditora = ?  AND idautor = ?  AND idassunto = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($obra->titulo);
		$sqlQuery->set($obra->anoPublicacao);

		
		$sqlQuery->setNumber($obra->idobra);

		$sqlQuery->setNumber($obra->ideditora);

		$sqlQuery->setNumber($obra->idautor);

		$sqlQuery->setNumber($obra->idassunto);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM obra';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM obra WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnoPublicacao($value){
		$sql = 'SELECT * FROM obra WHERE ano_publicacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM obra WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnoPublicacao($value){
		$sql = 'DELETE FROM obra WHERE ano_publicacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ObraMySql 
	 */
	protected function readRow($row){
		$obra = new Obra();
		
		$obra->idobra = $row['idobra'];
		$obra->titulo = $row['titulo'];
		$obra->anoPublicacao = $row['ano_publicacao'];
		$obra->ideditora = $row['ideditora'];
		$obra->idautor = $row['idautor'];
		$obra->idassunto = $row['idassunto'];

		return $obra;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ObraMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>