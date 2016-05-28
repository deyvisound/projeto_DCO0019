<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AssuntoDAO
	 */
	public static function getAssuntoDAO(){
		return new AssuntoMySqlExtDAO();
	}

	/**
	 * @return AutorDAO
	 */
	public static function getAutorDAO(){
		return new AutorMySqlExtDAO();
	}

	/**
	 * @return ChefesDAO
	 */
	public static function getChefesDAO(){
		return new ChefesMySqlExtDAO();
	}

	/**
	 * @return DepartamentoDAO
	 */
	public static function getDepartamentoDAO(){
		return new DepartamentoMySqlExtDAO();
	}

	/**
	 * @return DevolucaoDAO
	 */
	public static function getDevolucaoDAO(){
		return new DevolucaoMySqlExtDAO();
	}

	/**
	 * @return EditoraDAO
	 */
	public static function getEditoraDAO(){
		return new EditoraMySqlExtDAO();
	}

	/**
	 * @return EmprestimoDAO
	 */
	public static function getEmprestimoDAO(){
		return new EmprestimoMySqlExtDAO();
	}

	/**
	 * @return ExemplarDAO
	 */
	public static function getExemplarDAO(){
		return new ExemplarMySqlExtDAO();
	}

	/**
	 * @return FuncionarioDAO
	 */
	public static function getFuncionarioDAO(){
		return new FuncionarioMySqlExtDAO();
	}

	/**
	 * @return ObraDAO
	 */
	public static function getObraDAO(){
		return new ObraMySqlExtDAO();
	}

	/**
	 * @return SituacaoDAO
	 */
	public static function getSituacaoDAO(){
		return new SituacaoMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}


}
?>