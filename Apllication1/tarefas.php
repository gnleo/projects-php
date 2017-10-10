<!-- PROJETO WEB 1 -->

	
<!-- VERIFICA AS VARIAVEIS PARA INSERCAO NO BANCO DE DADOS -->

<?php 

	session_start();

	include "1_banco.php"; # inclui funcoes com banco de dados
	include "1_procedimentosTarefas.php"; # inclui funcoes de tratamentos

	$exibir_tabela = true;
	$erro = false;
	$erro_validacao = array();

	if(verifica_post()){
		$tarefa = array();

		# verifica se o campo foi preenchido
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

		# verifica se o campo foi preenchido corretamente
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

		# Utilizando banco de dados
		if(! $erro){
			gravar_tarefa($conexao, $tarefa);
			header('Location: tarefas.php');
			die();	
		}
	}

	$lista_tarefas = buscar_tarefas($conexao);

	# inicializa uma tarefa para controle do primeiro acesso
	$tarefa = array('id'=> 0,'nome'=> (isset($_POST['nome'])) ? $_POST['nome'] : "", 'descricao'=> (isset($_POST['descricao'])) ? $_POST['descricao'] : "", 'prazo'=> (isset($_POST['prazo'])) ? data($_POST['prazo']) : "", 'prioridade'=> (isset($_POST['prioridade'])) ? $_POST['prioridade'] : 1, 'concluida'=> (isset($_POST['concluida'])) ? $_POST['concluida'] : "");

	include "1_template.php"; # inclusao feita aqui por causa do uso da variavel $lista_tarefas que foi incializada acima

?>

