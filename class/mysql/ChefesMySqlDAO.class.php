<?php
/**
 * Class that operate on table 'chefes'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class ChefesMySqlDAO implements ChefesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ChefesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM chefes WHERE idchefes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM chefes';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM chefes ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param chefe primary key
 	 */
	public function delete($idchefes){
		$sql = 'DELETE FROM chefes WHERE idchefes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idchefes);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ChefesMySql chefe
 	 */
	public function insert($chefe){
		$sql = 'INSERT INTO chefes (nome) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($chefe->nome);

		$id = $this->executeInsert($sqlQuery);	
		$chefe->idchefes = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ChefesMySql chefe
 	 */
	public function update($chefe){
		$sql = 'UPDATE chefes SET nome = ? WHERE idchefes = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($chefe->nome);

		$sqlQuery->setNumber($chefe->idchefes);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM chefes';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM chefes WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM chefes WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ChefesMySql 
	 */
	protected function readRow($row){
		$chefe = new Chefe();
		
		$chefe->idchefes = $row['idchefes'];
		$chefe->nome = $row['nome'];

		return $chefe;
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
	 * @return ChefesMySql 
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