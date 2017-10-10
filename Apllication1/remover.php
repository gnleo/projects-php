

<?php 

	include "1_banco.php";

	remover_tarefa($conexao, $_GET['id']);

	header('Location: tarefas.php');
?>

