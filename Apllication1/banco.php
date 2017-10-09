
<!-- ATIVIDADES COM BANCO DE DADOS -->

<?php 
	
	$servidor = '';
	$usuario = '';
	$senha = '';
	$banco = '';

	$conexao = mysqli_connect($servidor, $usuario,$senha, $banco);

	if(mysqli_connect_errno($conexao)){
		echo 'Problemas na conexao';
		die();
	}

	# busca as tarefas já cadastradas no banco
	function buscar_tarefas($conexao){
		$sqlBusca = 'select * from tarefas';
		$sqlResultado = mysqli_query($conexao, $sqlBusca);
		$tarefas = array();
		while($tarefa = mysqli_fetch_assoc($sqlResultado)){
			$tarefas [] = $tarefa;
		}
		return $tarefas;
	}

	function gravar_tarefa($conexao, $tarefa){
		if($tarefa['prazo'] == 'null'){
			$sqlInsere = "insert into tarefas(nome, descricao, prazo, prioridade, concluida) values('{$tarefa['nome']}', '{$tarefa['descricao']}', {$tarefa['prazo']}, '{$tarefa['prioridade']}', '{$tarefa['concluida']}');";
		} else{
			$sqlInsere = "insert into tarefas(nome, descricao, prazo, prioridade, concluida) values('{$tarefa['nome']}', '{$tarefa['descricao']}', '{$tarefa['prazo']}', '{$tarefa['prioridade']}', '{$tarefa['concluida']}');";
		}
		mysqli_query($conexao, $sqlInsere);
	}

	# busca tarefa para edicao
	function buscar_tarefa($conexao, $id){
		$sqlBusca = 'select * from tarefas where id = ' .$id;
		$sqlResultado = mysqli_query($conexao, $sqlBusca);
		return mysqli_fetch_assoc($sqlResultado);
	}

	function editar_tarefa($conexao, $tarefa){
		if($tarefa['prazo'] == 'null'){
			$sqlEditar = "update tarefas set nome='{$tarefa['nome']}', descricao='{$tarefa['descricao']}', prazo={$tarefa['prazo']}, prioridade='{$tarefa['prioridade']}', concluida='{$tarefa['concluida']}' where id = '{$tarefa['id']}';";
			mysqli_query($conexao, $sqlEditar);
		} else{
			$sqlEditar = "update tarefas set nome='{$tarefa['nome']}', descricao='{$tarefa['descricao']}', prazo='{$tarefa['prazo']}', prioridade='{$tarefa['prioridade']}', concluida='{$tarefa['concluida']}' where id = '{$tarefa['id']}';";
			mysqli_query($conexao, $sqlEditar);
		}
	}

	function remover_tarefa($conexao, $id){
		$sqlRemover = "delete from tarefas where id = $id";
		mysqli_query($conexao, $sqlRemover);
	}

?>
