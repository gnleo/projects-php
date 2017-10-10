

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Gerenciador de tarefas</title>
	<link rel="stylesheet" type="text/css" href="css/tarefas.css">
</head>

<body>

	<h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
	<p> <a href="tarefas.php"> Voltar para a lista de tarefas </a></p>

	<p><strong> Concluída: </strong> <?php echo traduz_concluida($tarefa['concluida']); ?></p>

	<p><strong> Descrição: </strong> <?php echo nl2br($tarefa['descricao']); ?></p>	

	<p><strong> Prazo: </strong> <?php echo traduz_data_exibicao($tarefa['prazo']); ?></p>

	<p><strong> Prioridade: </strong> <?php echo traduz_prioridade($tarefa['prioridade']); ?></p>

	<h2> Anexos</h2>
	<!-- lista anexos -->
	<?php if(count($anexos) > 0) : ?>
		<table>
			<tr>
				<th>Arquivo</th>
				<th>Opções</th>
			</tr>
			<?php foreach ($anexos as $anexo) : ?>
				<tr>
					<td> <?php echo $anexo['nome']; ?> </td>
					<td> <a href="anexos/<?php echo $anexo['arquivo']; ?>">Download</a></td> <!-- diretorio da pasta no servidor -->
				</tr>
			<?php endforeach ?>
		</table>
	<?php else : ?>
		<p>Não há anexos para esta tarefa.</p>
	<?php endif; ?>

	<!-- formulario para novo anexo -->
	<form method="POST" enctype="multipart/form-data">
		<fieldset>
			<legend>Novo anexo</legend>
			<input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?>">
			<label>
				<?php if($erro && isset($erro_validacao['anexo'])): ?>
					<span class="erro"> <?php echo $erro_validacao['anexo']; ?> </span>
				<?php endif; ?>
				<input type="file" name="anexo"/>
			</label>
			<input type="submit" name="cadastrar"/>
		</fieldset>
	</form>

</body>

</html>
