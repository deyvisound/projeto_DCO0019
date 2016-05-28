<?php
// include all DAO files
require_once ('class/sql/Connection.class.php');
require_once ('class/sql/ConnectionFactory.class.php');
require_once ('class/sql/ConnectionProperty.class.php');
require_once ('class/sql/QueryExecutor.class.php');
require_once ('class/sql/Transaction.class.php');
require_once ('class/sql/SqlQuery.class.php');
require_once ('class/core/ArrayList.class.php');
require_once ('class/dao/DAOFactory.class.php');

require_once ('class/dao/AssuntoDAO.class.php');
require_once ('class/dto/Assunto.class.php');
require_once ('class/mysql/AssuntoMySqlDAO.class.php');
require_once ('class/mysql/ext/AssuntoMySqlExtDAO.class.php');
require_once ('class/dao/AutorDAO.class.php');
require_once ('class/dto/Autor.class.php');
require_once ('class/mysql/AutorMySqlDAO.class.php');
require_once ('class/mysql/ext/AutorMySqlExtDAO.class.php');
require_once ('class/dao/ChefesDAO.class.php');
require_once ('class/dto/Chefe.class.php');
require_once ('class/mysql/ChefesMySqlDAO.class.php');
require_once ('class/mysql/ext/ChefesMySqlExtDAO.class.php');
require_once ('class/dao/DepartamentoDAO.class.php');
require_once ('class/dto/Departamento.class.php');
require_once ('class/mysql/DepartamentoMySqlDAO.class.php');
require_once ('class/mysql/ext/DepartamentoMySqlExtDAO.class.php');
require_once ('class/dao/DevolucaoDAO.class.php');
require_once ('class/dto/Devolucao.class.php');
require_once ('class/mysql/DevolucaoMySqlDAO.class.php');
require_once ('class/mysql/ext/DevolucaoMySqlExtDAO.class.php');
require_once ('class/dao/EditoraDAO.class.php');
require_once ('class/dto/Editora.class.php');
require_once ('class/mysql/EditoraMySqlDAO.class.php');
require_once ('class/mysql/ext/EditoraMySqlExtDAO.class.php');
require_once ('class/dao/EmprestimoDAO.class.php');
require_once ('class/dto/Emprestimo.class.php');
require_once ('class/mysql/EmprestimoMySqlDAO.class.php');
require_once ('class/mysql/ext/EmprestimoMySqlExtDAO.class.php');
require_once ('class/dao/ExemplarDAO.class.php');
require_once ('class/dto/Exemplar.class.php');
require_once ('class/mysql/ExemplarMySqlDAO.class.php');
require_once ('class/mysql/ext/ExemplarMySqlExtDAO.class.php');
require_once ('class/dao/FuncionarioDAO.class.php');
require_once ('class/dto/Funcionario.class.php');
require_once ('class/mysql/FuncionarioMySqlDAO.class.php');
require_once ('class/mysql/ext/FuncionarioMySqlExtDAO.class.php');
require_once ('class/dao/ObraDAO.class.php');
require_once ('class/dto/Obra.class.php');
require_once ('class/mysql/ObraMySqlDAO.class.php');
require_once ('class/mysql/ext/ObraMySqlExtDAO.class.php');
require_once ('class/dao/SituacaoDAO.class.php');
require_once ('class/dto/Situacao.class.php');
require_once ('class/mysql/SituacaoMySqlDAO.class.php');
require_once ('class/mysql/ext/SituacaoMySqlExtDAO.class.php');
require_once ('class/dao/UsuarioDAO.class.php');
require_once ('class/dto/Usuario.class.php');
require_once ('class/mysql/UsuarioMySqlDAO.class.php');
require_once ('class/mysql/ext/UsuarioMySqlExtDAO.class.php');

$path = "view/";
$diretorio = dir ( $path );
while ( $arquivo = $diretorio->read () ) {
	if(stripos($arquivo, ".php")){
		require_once $path . $arquivo;
	}
}
$diretorio->close ();

$path = "controller/";
$diretorio = dir ( $path );
while ( $arquivo = $diretorio->read () ) {
	if(stripos($arquivo, ".php")){
		require_once $path . $arquivo;
	}
}
$diretorio->close ();



?>

<script type="text/javascript" src="assets/js/jquery.js"></script>