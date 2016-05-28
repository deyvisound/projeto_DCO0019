<?php
/**
 * Class that operate on table 'departamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class DepartamentoMySqlDAO implements DepartamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DepartamentoMySql 
	 */
	public function load($idDepartamento, $idchefes){
		$sql = 'SELECT * FROM departamento WHERE idDepartamento = ?  AND idchefes = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idDepartamento);
		$sqlQuery->setNumber($idchefes);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM departamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM departamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param departamento primary key
 	 */
	public function delete($idDepartamento, $idchefes){
		$sql = 'DELETE FROM departamento WHERE idDepartamento = ?  AND idchefes = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idDepartamento);
		$sqlQuery->setNumber($idchefes);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DepartamentoMySql departamento
 	 */
	public function insert($departamento){
		$sql = 'INSERT INTO departamento (nome, idDepartamento, idchefes) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($departamento->nome);

		
		$sqlQuery->setNumber($departamento->idDepartamento);

		$sqlQuery->setNumber($departamento->idchefes);

		$this->executeInsert($sqlQuery);	
		//$departamento->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DepartamentoMySql departamento
 	 */
	public function update($departamento){
		$sql = 'UPDATE departamento SET nome = ? WHERE idDepartamento = ?  AND idchefes = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($departamento->nome);

		
		$sqlQuery->setNumber($departamento->idDepartamento);

		$sqlQuery->setNumber($departamento->idchefes);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM departamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM departamento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM departamento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DepartamentoMySql 
	 */
	protected function readRow($row){
		$departamento = new Departamento();
		
		$departamento->idDepartamento = $row['idDepartamento'];
		$departamento->nome = $row['nome'];
		$departamento->idchefes = $row['idchefes'];

		return $departamento;
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
	 * @return DepartamentoMySql 
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