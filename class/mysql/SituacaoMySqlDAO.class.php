<?php
/**
 * Class that operate on table 'situacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class SituacaoMySqlDAO implements SituacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SituacaoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM situacao WHERE idsituacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM situacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM situacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param situacao primary key
 	 */
	public function delete($idsituacao){
		$sql = 'DELETE FROM situacao WHERE idsituacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idsituacao);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SituacaoMySql situacao
 	 */
	public function insert($situacao){
		$sql = 'INSERT INTO situacao (descricao) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($situacao->descricao);

		$id = $this->executeInsert($sqlQuery);	
		$situacao->idsituacao = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SituacaoMySql situacao
 	 */
	public function update($situacao){
		$sql = 'UPDATE situacao SET descricao = ? WHERE idsituacao = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($situacao->descricao);

		$sqlQuery->setNumber($situacao->idsituacao);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM situacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM situacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM situacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SituacaoMySql 
	 */
	protected function readRow($row){
		$situacao = new Situacao();
		
		$situacao->idsituacao = $row['idsituacao'];
		$situacao->descricao = $row['descricao'];

		return $situacao;
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
	 * @return SituacaoMySql 
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