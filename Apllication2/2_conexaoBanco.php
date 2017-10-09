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

?>
