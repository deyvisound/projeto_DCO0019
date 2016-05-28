<?php
/**
 * Class that operate on table 'emprestimo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class EmprestimoMySqlDAO implements EmprestimoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmprestimoMySql 
	 */
	public function load($idemprestimo, $idusuario, $idexemplar, $idfuncionario){
		$sql = 'SELECT * FROM emprestimo WHERE idemprestimo = ?  AND idusuario = ?  AND idexemplar = ?  AND idfuncionario = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idemprestimo);
		$sqlQuery->setNumber($idusuario);
		$sqlQuery->setNumber($idexemplar);
		$sqlQuery->setNumber($idfuncionario);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM emprestimo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM emprestimo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param emprestimo primary key
 	 */
	public function delete($idemprestimo, $idusuario, $idexemplar, $idfuncionario){
		$sql = 'DELETE FROM emprestimo WHERE idemprestimo = ?  AND idusuario = ?  AND idexemplar = ?  AND idfuncionario = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idemprestimo);
		$sqlQuery->setNumber($idusuario);
		$sqlQuery->setNumber($idexemplar);
		$sqlQuery->setNumber($idfuncionario);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmprestimoMySql emprestimo
 	 */
	public function insert($emprestimo){
		$sql = 'INSERT INTO emprestimo (data_emprestimo, previsao_devolucao, idemprestimo, idusuario, idexemplar, idfuncionario) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($emprestimo->dataEmprestimo);
		$sqlQuery->set($emprestimo->previsaoDevolucao);

		
		$sqlQuery->setNumber($emprestimo->idemprestimo);

		$sqlQuery->setNumber($emprestimo->idusuario);

		$sqlQuery->setNumber($emprestimo->idexemplar);

		$sqlQuery->setNumber($emprestimo->idfuncionario);

		$this->executeInsert($sqlQuery);	
		//$emprestimo->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmprestimoMySql emprestimo
 	 */
	public function update($emprestimo){
		$sql = 'UPDATE emprestimo SET data_emprestimo = ?, previsao_devolucao = ? WHERE idemprestimo = ?  AND idusuario = ?  AND idexemplar = ?  AND idfuncionario = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($emprestimo->dataEmprestimo);
		$sqlQuery->set($emprestimo->previsaoDevolucao);

		
		$sqlQuery->setNumber($emprestimo->idemprestimo);

		$sqlQuery->setNumber($emprestimo->idusuario);

		$sqlQuery->setNumber($emprestimo->idexemplar);

		$sqlQuery->setNumber($emprestimo->idfuncionario);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM emprestimo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDataEmprestimo($value){
		$sql = 'SELECT * FROM emprestimo WHERE data_emprestimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrevisaoDevolucao($value){
		$sql = 'SELECT * FROM emprestimo WHERE previsao_devolucao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDataEmprestimo($value){
		$sql = 'DELETE FROM emprestimo WHERE data_emprestimo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrevisaoDevolucao($value){
		$sql = 'DELETE FROM emprestimo WHERE previsao_devolucao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmprestimoMySql 
	 */
	protected function readRow($row){
		$emprestimo = new Emprestimo();
		
		$emprestimo->idemprestimo = $row['idemprestimo'];
		$emprestimo->idusuario = $row['idusuario'];
		$emprestimo->idexemplar = $row['idexemplar'];
		$emprestimo->dataEmprestimo = $row['data_emprestimo'];
		$emprestimo->previsaoDevolucao = $row['previsao_devolucao'];
		$emprestimo->idfuncionario = $row['idfuncionario'];

		return $emprestimo;
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
	 * @return EmprestimoMySql 
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