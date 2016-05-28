<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-05-27 20:48
 */
interface EmprestimoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Emprestimo 
	 */
	public function load($idemprestimo, $idusuario, $idexemplar, $idfuncionario);

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
 	 * @param emprestimo primary key
 	 */
	public function delete($idemprestimo, $idusuario, $idexemplar, $idfuncionario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Emprestimo emprestimo
 	 */
	public function insert($emprestimo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Emprestimo emprestimo
 	 */
	public function update($emprestimo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDataEmprestimo($value);

	public function queryByPrevisaoDevolucao($value);


	public function deleteByDataEmprestimo($value);

	public function deleteByPrevisaoDevolucao($value);


}
?>