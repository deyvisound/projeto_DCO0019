<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface AssuntoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Assunto 
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
 	 * @param assunto primary key
 	 */
	public function delete($idassunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Assunto assunto
 	 */
	public function insert($assunto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Assunto assunto
 	 */
	public function update($assunto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricao($value);


	public function deleteByDescricao($value);


}
?>