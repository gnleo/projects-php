
<?php 

	session_start();

	include "1_banco.php"; # inclui funcoes com banco de dados
	include "1_procedimentosTarefas.php"; # inclui funcoes de tratamentos

	$exibir_tabela = false;
	$erro = false;
	$erro_validacao = array();

	if(verifica_post()){
		$tarefa = array();

		$tarefa['id'] = $_POST['id'];


		if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
			$tarefa['nome'] = $_POST['nome'];
		} else{
			$erro = true;
			$erro_validacao['nome'] = "Campo obrigatório!";
		}

		if(isset($_POST['descricao']) && $_POST['descricao'] != ''){
			$tarefa['descricao'] = $_POST['descricao'];
		} else{
		 	$tarefa['descricao'] = "\0";
		}

		if(isset($_POST['prazo']) && strlen($_POST['prazo']) > 0){
			if(validar_data($_POST['prazo'])){
				$tarefa['prazo'] = traduz_data_mysql($_POST['prazo']);	
			} else {
				$erro = true;
				$erro_validacao['prazo'] = "Não é uma data válida!";
			}
		} else{
		 	$tarefa['prazo'] = 'null';
		}

		if(isset($_POST['prioridade'])){
		 	$tarefa['prioridade'] = $_POST['prioridade'];
		} 

		if(isset($_POST['concluida'])){
			$tarefa['concluida'] = $_POST['concluida'];
		} else{
		 	$tarefa['concluida'] = 0;
		}

		if(! $erro){
			editar_tarefa($conexao, $tarefa);
			header('Location: tarefas.php');
			die();	
		}
	}

	$tarefa = buscar_tarefa($conexao, $_GET['id']);

	# verifica as variaveis POST para inicializacao, se conter 'null' faz-se inicializao padrao
	$tarefa['nome'] = (isset($_POST['nome'])) ? $_POST['nome'] : $tarefa['nome'];
	$tarefa['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : $tarefa['descricao'];
	$tarefa['prazo'] = (isset($_POST['prazo'])) ? $_POST['prazo'] : $tarefa['prazo'];
	$tarefa['prioridade'] = (isset($_POST['prioridade'])) ? $_POST['prioridade'] : $tarefa['prioridade'];
	$tarefa['concluida'] = (isset($_POST['concluida'])) ? $_POST['concluida'] : $tarefa['concluida'];

	include "1_template.php";

?>

