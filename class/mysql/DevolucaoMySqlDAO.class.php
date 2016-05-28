<?php
/**
 * Class that operate on table 'devolucao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class DevolucaoMySqlDAO implements DevolucaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DevolucaoMySql 
	 */
	public function load($iddevolucao, $idfuncionario, $idemprestimo){
		$sql = 'SELECT * FROM devolucao WHERE iddevolucao = ?  AND idfuncionario = ?  AND idemprestimo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddevolucao);
		$sqlQuery->setNumber($idfuncionario);
		$sqlQuery->setNumber($idemprestimo);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM devolucao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM devolucao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param devolucao primary key
 	 */
	public function delete($iddevolucao, $idfuncionario, $idemprestimo){
		$sql = 'DELETE FROM devolucao WHERE iddevolucao = ?  AND idfuncionario = ?  AND idemprestimo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddevolucao);
		$sqlQuery->setNumber($idfuncionario);
		$sqlQuery->setNumber($idemprestimo);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DevolucaoMySql devolucao
 	 */
	public function insert($devolucao){
		$sql = 'INSERT INTO devolucao ( iddevolucao, idfuncionario, idemprestimo) VALUES ( ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($devolucao->iddevolucao);

		$sqlQuery->setNumber($devolucao->idfuncionario);

		$sqlQuery->setNumber($devolucao->idemprestimo);

		$this->executeInsert($sqlQuery);	
		//$devolucao->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DevolucaoMySql devolucao
 	 */
	public function update($devolucao){
		$sql = 'UPDATE devolucao SET  WHERE iddevolucao = ?  AND idfuncionario = ?  AND idemprestimo = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($devolucao->iddevolucao);

		$sqlQuery->setNumber($devolucao->idfuncionario);

		$sqlQuery->setNumber($devolucao->idemprestimo);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM devolucao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return DevolucaoMySql 
	 */
	protected function readRow($row){
		$devolucao = new Devolucao();
		
		$devolucao->iddevolucao = $row['iddevolucao'];
		$devolucao->idfuncionario = $row['idfuncionario'];
		$devolucao->idemprestimo = $row['idemprestimo'];

		return $devolucao;
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
	 * @return DevolucaoMySql 
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