

<?php 
	include "1_banco.php";
	include "1_procedimentosTarefas.php";

	$erro = false;
	$erro_validacao = array();

	if(verifica_post()){
		// upload dos anexos
		
		$tarefa_id = $_POST['tarefa_id'];

		if(! isset($_FILES['anexo'])){
			$erro = true;
			$erro_validacao['anexo'] = "Você deve selecionar um arquivo para anexar";
		} else{
			if(tratar_anexo($_FILES['anexo'])) {
				$anexo = array();
				$anexo['tarefa_id'] = $tarefa_id;
				$anexo['nome'] = $_FILES['anexo']['name'];
				$anexo['arquivo'] = $_FILES['anexo']['name'];
			} else{
				$erro = true;
				$erro_validacao['anexo'] = "Envie apenas anexos nos formatos zip ou pdf ";
			}
		}

		if(! $erro){
			gravar_anexo($conexao, $anexo);
		}
	}

	$tarefa = buscar_tarefa($conexao, $_GET['id']);
	$anexos = buscar_anexos($conexao, $_GET['id']);

	include "1_template_anexos.php";

?>
