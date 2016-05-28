<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface AutorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Autor 
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
 	 * @param autor primary key
 	 */
	public function delete($idautor);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Autor autor
 	 */
	public function insert($autor);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Autor autor
 	 */
	public function update($autor);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>