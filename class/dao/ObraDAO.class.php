<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface ObraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Obra 
	 */
	public function load($idobra, $ideditora, $idautor, $idassunto);

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
 	 * @param obra primary key
 	 */
	public function delete($idobra, $ideditora, $idautor, $idassunto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Obra obra
 	 */
	public function insert($obra);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Obra obra
 	 */
	public function update($obra);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByAnoPublicacao($value);


	public function deleteByTitulo($value);

	public function deleteByAnoPublicacao($value);


}
?>