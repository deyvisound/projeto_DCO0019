<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface DepartamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Departamento 
	 */
	public function load($idDepartamento, $idchefes);

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
 	 * @param departamento primary key
 	 */
	public function delete($idDepartamento, $idchefes);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Departamento departamento
 	 */
	public function insert($departamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Departamento departamento
 	 */
	public function update($departamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>