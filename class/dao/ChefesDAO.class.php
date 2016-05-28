<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface ChefesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Chefes 
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
 	 * @param chefe primary key
 	 */
	public function delete($idchefes);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Chefes chefe
 	 */
	public function insert($chefe);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Chefes chefe
 	 */
	public function update($chefe);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>