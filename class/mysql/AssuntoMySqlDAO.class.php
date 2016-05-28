<?php
/**
 * Class that operate on table 'assunto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class AssuntoMySqlDAO implements AssuntoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AssuntoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM assunto WHERE idassunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM assunto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM assunto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param assunto primary key
 	 */
	public function delete($idassunto){
		$sql = 'DELETE FROM assunto WHERE idassunto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idassunto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AssuntoMySql assunto
 	 */
	public function insert($assunto){
		$sql = 'INSERT INTO assunto (descricao) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($assunto->descricao);

		$id = $this->executeInsert($sqlQuery);	
		$assunto->idassunto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AssuntoMySql assunto
 	 */
	public function update($assunto){
		$sql = 'UPDATE assunto SET descricao = ? WHERE idassunto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($assunto->descricao);

		$sqlQuery->setNumber($assunto->idassunto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM assunto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM assunto WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM assunto WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AssuntoMySql 
	 */
	protected function readRow($row){
		$assunto = new Assunto();
		
		$assunto->idassunto = $row['idassunto'];
		$assunto->descricao = $row['descricao'];

		return $assunto;
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
	 * @return AssuntoMySql 
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