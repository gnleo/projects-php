
<!-- REALIZA O CADASTRO DE NOVOS USUARIOS -->

<?php 

	include "2_conexaoBanco.php";

	

	// if (isset($_POST['nome-cadastro']) && $_POST['nome-cadastro'] != '') {
	// 	if (isset($_POST['email-cadastro']) && $_POST['email-cadastro'] != '') {
	// 		if (isset($_POST['senha-cadastro']) && $_POST['senha-cadastro'] != '') {
	// 			$nome_cadastro = $_POST['nome-cadastro'];
	// 			$email_cadastro = $_POST['email-cadastro'];
	// 			$senha_cadastro = $_POST['senha-cadastro'];
	// 			insere_usuario($conexao, $nome_cadastro, $email_cadastro, $senha_cadastro);
	// 		} else{
	// 			return false;
	// 		}
	// 	} else{
	// 		return false;
	// 	}
	// } else{
	// 	return false;
	// }

	$selecao = $_POST['action'];

	switch ($selecao) {

		case 'cadastrar':

			if (isset($_POST['nome-cadastro']) && $_POST['nome-cadastro'] != '') {

				if (isset($_POST['email-cadastro']) && $_POST['email-cadastro'] != '') {

					if (isset($_POST['senha-cadastro']) && $_POST['senha-cadastro'] != '') {

						$nome_cadastro = $_POST['nome-cadastro'];
						$email_cadastro = $_POST['email-cadastro'];
						$senha_cadastro = $_POST['senha-cadastro'];
						insere_usuario($conexao, $nome_cadastro, $email_cadastro, $senha_cadastro);

					} else{
						return false;
					}

				} else{
					return false;
				}

			} else{
				return false;
			}

			break;
		

		default:
			# code...
			break;
	}

	
?>
