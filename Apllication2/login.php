<!-- PROJETO WEB 2 -->

<?php 

	$erroLogin = null;
	
	include "2_conexaoBanco.php";

	if(verifica_post()){
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$senhacript = md5($senha);

		# checa se e um usuario valido
		$usuario = verifica_login($conexao, $login, $senhacript);

		# faz o redirecionamento do usuário
		if(empty($usuario)){
			$erroLogin = "Login ou senha incorreto!";
		} else{
			# entra na pagina principal do site
			header('Location: apppescado.php');
			die();
		}
	}

	function verifica_post(){
		if(count($_POST) > 0){
			return true;
		} else{
			return false;
		}
	}

	include "2_templateLogin.php";

?>
