<?php
/**
 * Class that operate on table 'usuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
class UsuarioMySqlDAO implements UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($idusuario){
		$sql = 'DELETE FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idusuario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuario (nome, telefone, login, senha) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nome);
		$sqlQuery->set($usuario->telefone);
		$sqlQuery->set($usuario->login);
		$sqlQuery->set($usuario->senha);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->idusuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuario SET nome = ?, telefone = ?, login = ?, senha = ? WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nome);
		$sqlQuery->set($usuario->telefone);
		$sqlQuery->set($usuario->login);
		$sqlQuery->set($usuario->senha);

		$sqlQuery->setNumber($usuario->idusuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM usuario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM usuario WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLogin($value){
		$sql = 'SELECT * FROM usuario WHERE login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM usuario WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM usuario WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogin($value){
		$sql = 'DELETE FROM usuario WHERE login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->idusuario = $row['idusuario'];
		$usuario->nome = $row['nome'];
		$usuario->telefone = $row['telefone'];
		$usuario->login = $row['login'];
		$usuario->senha = $row['senha'];

		return $usuario;
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
	 * @return UsuarioMySql 
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