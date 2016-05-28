<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface EditoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Editora 
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
 	 * @param editora primary key
 	 */
	public function delete($ideditora);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Editora editora
 	 */
	public function insert($editora);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Editora editora
 	 */
	public function update($editora);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByCidade($value);


	public function deleteByNome($value);

	public function deleteByCidade($value);


}
?>