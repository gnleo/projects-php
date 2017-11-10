

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

		case 'inserir':

			if (isset($_POST['enunciado']) && $_POST['enunciado'] != '') {

				if (isset($_POST['opcaoA']) && $_POST['opcaoA'] != '') {

					if (isset($_POST['opcaoB']) && $_POST['opcaoB'] != '') {

						if (isset($_POST['opcaoC']) && $_POST['opcaoC'] != '') {

							if (isset($_POST['resposta']) && $_POST['resposta'] != '') {

								if(strlen($_POST['resposta']) == 1){
									$questao = array();
									$questao['id_usuario'] = $_POST['id_usuario'];
									$questao['enunciado'] = $_POST['enunciado'];
									$questao['opcaoA'] = $_POST['opcaoA'];
									$questao['opcaoB'] = $_POST['opcaoB'];
									$questao['opcaoC'] = $_POST['opcaoC'];
									$questao['resposta'] = $_POST['resposta'];

									insere_questao($conexao, $questao);
									$resultado = "Inserida com sucesso";
									echo json_encode($resultado);

								} else{

									$resultado = "O campo de resposta deve conter apenas um caractere";
									echo json_encode($resultado);

								}

							} else{
								$resultado = "Campo de resposta em branco";
								echo json_encode($resultado);
							}

						} else{
							$resultado = "Campo de alternativa C em branco";
							echo json_encode($resultado);
						}

					} else{
						$resultado = "Campo de alternativa B em branco";
						echo json_encode($resultado);
					}

				} else{
					$resultado = "Campo de alternativa A em branco";
					echo json_encode($resultado);
				}

			} else{
				$resultado = "Campo de enunciado em branco";
				echo json_encode($resultado);
			}
			
			break;

		case 'editar':

			if (isset($_POST['enunciado']) && $_POST['enunciado'] != '') {

				if (isset($_POST['opcaoA']) && $_POST['opcaoA'] != '') {

					if (isset($_POST['opcaoB']) && $_POST['opcaoB'] != '') {

						if (isset($_POST['opcaoC']) && $_POST['opcaoC'] != '') {

							if (isset($_POST['resposta']) && $_POST['resposta'] != '') {

								if(strlen($_POST['resposta']) == 1){
									$questao = array();
									$questao['id'] = $_POST['id_questao'];
									$questao['enunciado'] = $_POST['enunciado'];
									$questao['opcaoA'] = $_POST['opcaoA'];
									$questao['opcaoB'] = $_POST['opcaoB'];
									$questao['opcaoC'] = $_POST['opcaoC'];
									$questao['resposta'] = $_POST['resposta'];

									editar_questao($conexao, $questao);
									$resultado = "Editada com sucesso";
									echo json_encode($resultado);

								} else{

									$resultado = "O campo de resposta deve conter apenas um caractere";
									echo json_encode($resultado);

								}

							} else{
								$resultado = "Campo de resposta em branco";
								echo json_encode($resultado);
							}

						} else{
							$resultado = "Campo de alternativa C em branco";
							echo json_encode($resultado);
						}

					} else{
						$resultado = "Campo de alternativa B em branco";
						echo json_encode($resultado);
					}

				} else{
					$resultado = "Campo de alternativa A em branco";
					echo json_encode($resultado);
				}

			} else{
				$resultado = "Campo de enunciado em branco";
				echo json_encode($resultado);
			}
			
			break;

		case 'busca':
			if(!empty($_POST['id_questao'])){
				$id_questao = $_POST['id_questao'];
				$resultado = buscar_questao($conexao, $id_questao);
				
				$enunciado = $resultado['enunciado'];
				$opcaoA = $resultado['opcaoA'];
				$opcaoB = $resultado['opcaoB'];
				$opcaoC = $resultado['opcaoC'];
				$resposta = $resultado['resposta'];

				$questao = "$enunciado&$opcaoA&$opcaoB&$opcaoC&$resposta";

				echo json_encode($questao);
				// echo json_encode($opcaoA);
				// echo json_encode($opcaoB);
				// echo json_encode($opcaoC);
				// echo json_encode($resposta);
			}else{
				$resultado = "Sem resultados";
				echo json_encode($resultado);
			}

			break;

		case 'delete':
			$id_questao = $_POST['id_questao'];
			remover_questao($conexao, $id_questao);
			$resultado = "Excluido com sucesso";
			echo json_encode($resultado);

			break;


		default:
			break;
	}

	
?>

