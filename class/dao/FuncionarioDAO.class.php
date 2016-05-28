<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface FuncionarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Funcionario 
	 */
	public function load($idfuncionario, $idDepartamento);

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
 	 * @param funcionario primary key
 	 */
	public function delete($idfuncionario, $idDepartamento);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function insert($funcionario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Funcionario funcionario
 	 */
	public function update($funcionario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryBySalario($value);


	public function deleteByNome($value);

	public function deleteBySalario($value);


}
?>