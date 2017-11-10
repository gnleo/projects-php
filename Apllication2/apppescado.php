<!-- PROJETO WEB 2 -->

<?php
	
	session_start();

	include "2_conexaoBanco.php";

	if(isset($_SESSION['logado'])){
		$usuario = buscar_dados_usuario($conexao,  $_SESSION['id-User']);	
		$lista_questoes = buscar_questoes($conexao, $_SESSION['id-User']);
		include "2_templateAppPescado.php";		
	} else{
		sleep(2);
		header('Location: 2_restrito.php');
		die();
	}

?>

