
<!-- REALIZA O CADASTRO DE NOVOS USUARIOS -->

<?php 

	include "2_conexaoBanco.php";

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
						$resultado = "Cadastro efetuado com sucesso!<br>Efetue o login";
						echo json_encode($resultado);

					} else{
						$resultado = "Existem campos em branco";
						echo json_encode($resultado);
					}

				} else{
					$resultado = "Existem campos em branco";
					echo json_encode($resultado);
				}

			} else{
				$resultado = "Existem campos em branco";
				echo json_encode($resultado);
			}

			break;
		

		default:
			# code...
			break;
	}

	
?>

