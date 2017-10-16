<?php 

	$servidor = '';
	$usuario = '';
	$senha = '';
	$banco = '';

	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

	if(mysqli_connect_errno($conexao)){
		echo 'Problemas na conexao';
		die();
	}

	function verifica_login($conexao, $login, $senha){
		$sqlBusca = "select * from usuarios where email = '$login' and senha = '$senha' limit 1;";
		$sqlResultado = mysqli_query($conexao, $sqlBusca);
		return $usuario = mysqli_fetch_assoc($sqlResultado);
	}

	function insere_usuario($conexao, $usario, $email, $senha){
		$senhaCript = md5($senha);
		$sqlInsereUsuario = "insert into usuarios(nome, email, senha) values ('{$usario}', '{$email}', '{$senhaCript}')";
		mysqli_query($conexao, $sqlInsereUsuario);
	}

	// busca todas as questoes no banco de dados
	function buscar_questoes($conexao, $id_usuario){
		$sqlBusca = 'select * from questoes where id_usuario = ' .$id_usuario;
		$sqlResultado = mysqli_query($conexao, $sqlBusca);
		$questoes = array();
		while($questao = mysqli_fetch_assoc($sqlResultado)){
			$questoes [] = $questao;
		}
		return $questoes;
	}

	// busca questao especifica
	function buscar_questao($conexao, $id){
		$sqlBusca = 'select * from questoes where id = ' .$id;
		$sqlResultado = mysqli_query($conexao, $sqlBusca);
		return mysqli_fetch_assoc($sqlResultado);
	}
	
	function insere_questao($conexao, $questao){
		$sqlInsere = "insert into questoes(id_usuario, enunciado, opcaoA, opcaoB, opcaoC, resposta) values('{$questao['id_usuario']}', '{$questao['enunciado']}', '{$questao['opcaoA']}', '{$questao['opcaoB']}', '{$questao['$opcaoC']}', '{$questao['$resposta']}');";
		echo $sqlInsere;
	}


	function editar_questao($conexao, $questao){
		$sqlEditar = "update questoes set enunciado='{$questao['enunciado']}', opcaoA='{$questao['opcaoA']}', opcaoB='{$questao['opcaoB']}', opcaoC='{$questao['$opcaoC']}', resposta='{$questao['$resposta']}' where id = '{$questao['id']}';";
		mysqli_query($conexao, $sqlEditar);

	}

	function remover_questao($conexao, $id){
		$sqlRemover = "delete from questoes where id = $id";
		mysqli_query($conexao, $sqlRemover);
	}
?>
