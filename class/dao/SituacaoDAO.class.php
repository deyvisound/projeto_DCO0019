<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface SituacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Situacao 
	 */
	public function load($id);

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
 	 * @param situacao primary key
 	 */
	public function delete($idsituacao);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Situacao situacao
 	 */
	public function insert($situacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Situacao situacao
 	 */
	public function update($situacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricao($value);


	public function deleteByDescricao($value);


}
?>