<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface ExemplarDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Exemplar 
	 */
	public function load($idexemplar, $idobra, $idsituacao);

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
 	 * @param exemplar primary key
 	 */
	public function delete($idexemplar, $idobra, $idsituacao);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Exemplar exemplar
 	 */
	public function insert($exemplar);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Exemplar exemplar
 	 */
	public function update($exemplar);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDataAquisicao($value);


	public function deleteByDataAquisicao($value);


}
?>