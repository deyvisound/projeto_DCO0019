<?php
/**
 * Class that operate on table 'exemplar'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class ExemplarMySqlDAO implements ExemplarDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ExemplarMySql 
	 */
	public function load($idexemplar, $idobra, $idsituacao){
		$sql = 'SELECT * FROM exemplar WHERE idexemplar = ?  AND idobra = ?  AND idsituacao = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idexemplar);
		$sqlQuery->setNumber($idobra);
		$sqlQuery->setNumber($idsituacao);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM exemplar';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM exemplar ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param exemplar primary key
 	 */
	public function delete($idexemplar, $idobra, $idsituacao){
		$sql = 'DELETE FROM exemplar WHERE idexemplar = ?  AND idobra = ?  AND idsituacao = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idexemplar);
		$sqlQuery->setNumber($idobra);
		$sqlQuery->setNumber($idsituacao);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ExemplarMySql exemplar
 	 */
	public function insert($exemplar){
		$sql = 'INSERT INTO exemplar (data_aquisicao, idexemplar, idobra, idsituacao) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($exemplar->dataAquisicao);

		
		$sqlQuery->setNumber($exemplar->idexemplar);

		$sqlQuery->setNumber($exemplar->idobra);

		$sqlQuery->setNumber($exemplar->idsituacao);

		$this->executeInsert($sqlQuery);	
		//$exemplar->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ExemplarMySql exemplar
 	 */
	public function update($exemplar){
		$sql = 'UPDATE exemplar SET data_aquisicao = ? WHERE idexemplar = ?  AND idobra = ?  AND idsituacao = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($exemplar->dataAquisicao);

		
		$sqlQuery->setNumber($exemplar->idexemplar);

		$sqlQuery->setNumber($exemplar->idobra);

		$sqlQuery->setNumber($exemplar->idsituacao);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM exemplar';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataAquisicao($value){
		$sql = 'SELECT * FROM exemplar WHERE data_aquisicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataAquisicao($value){
		$sql = 'DELETE FROM exemplar WHERE data_aquisicao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ExemplarMySql 
	 */
	protected function readRow($row){
		$exemplar = new Exemplar();
		
		$exemplar->idexemplar = $row['idexemplar'];
		$exemplar->dataAquisicao = $row['data_aquisicao'];
		$exemplar->idobra = $row['idobra'];
		$exemplar->idsituacao = $row['idsituacao'];

		return $exemplar;
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
	 * @return ExemplarMySql 
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