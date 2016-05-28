<?php
/**
 * Class that operate on table 'funcionario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class FuncionarioMySqlDAO implements FuncionarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FuncionarioMySql 
	 */
	public function load($idfuncionario, $idDepartamento){
		$sql = 'SELECT * FROM funcionario WHERE idfuncionario = ?  AND idDepartamento = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idfuncionario);
		$sqlQuery->setNumber($idDepartamento);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM funcionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM funcionario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param funcionario primary key
 	 */
	public function delete($idfuncionario, $idDepartamento){
		$sql = 'DELETE FROM funcionario WHERE idfuncionario = ?  AND idDepartamento = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idfuncionario);
		$sqlQuery->setNumber($idDepartamento);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FuncionarioMySql funcionario
 	 */
	public function insert($funcionario){
		$sql = 'INSERT INTO funcionario (nome, salario, idfuncionario, idDepartamento) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($funcionario->nome);
		$sqlQuery->set($funcionario->salario);

		
		$sqlQuery->setNumber($funcionario->idfuncionario);

		$sqlQuery->setNumber($funcionario->idDepartamento);

		$this->executeInsert($sqlQuery);	
		//$funcionario->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FuncionarioMySql funcionario
 	 */
	public function update($funcionario){
		$sql = 'UPDATE funcionario SET nome = ?, salario = ? WHERE idfuncionario = ?  AND idDepartamento = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($funcionario->nome);
		$sqlQuery->set($funcionario->salario);

		
		$sqlQuery->setNumber($funcionario->idfuncionario);

		$sqlQuery->setNumber($funcionario->idDepartamento);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM funcionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM funcionario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySalario($value){
		$sql = 'SELECT * FROM funcionario WHERE salario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM funcionario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySalario($value){
		$sql = 'DELETE FROM funcionario WHERE salario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FuncionarioMySql 
	 */
	protected function readRow($row){
		$funcionario = new Funcionario();
		
		$funcionario->idfuncionario = $row['idfuncionario'];
		$funcionario->nome = $row['nome'];
		$funcionario->salario = $row['salario'];
		$funcionario->idDepartamento = $row['idDepartamento'];

		return $funcionario;
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
	 * @return FuncionarioMySql 
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