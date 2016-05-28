<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface DevolucaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Devolucao 
	 */
	public function load($iddevolucao, $idfuncionario, $idemprestimo);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param devolucao primary key
 	 */
	public function delete($iddevolucao, $idfuncionario, $idemprestimo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Devolucao devolucao
 	 */
	public function insert($devolucao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Devolucao devolucao
 	 */
	public function update($devolucao);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>