

<table>
	<tr>
		<th>Tarefas</th>
		<th>Descrição</th>
		<th>Prazo</th>
		<th>Prioridade</th>
		<th>Concluída</th>
		<th>Opções</th>
	</tr>

	<?php foreach ($lista_tarefas as $tarefa): ?>
		<tr>
			<td> <a href="1_anexos.php?id=<?php echo $tarefa['id'];?>"> <?php echo $tarefa['nome']; ?> </a></td>
			<td> <?php echo $tarefa['descricao']; ?> </td>
			<td class="td-center"> <?php echo traduz_data_exibicao($tarefa['prazo']); ?> </td>
			<td class="td-center"> <?php echo traduz_prioridade($tarefa['prioridade']); ?> </td>
			<td class="td-center"> <?php echo traduz_concluida($tarefa['concluida']); ?> </td>
			<td class="td-center"> <a href="1_editar.php?id=<?php echo $tarefa['id'];?>">Editar</a> <a href="1_remover.php?id=<?php echo $tarefa['id'];?>">Remover</a> </td>
		</tr>
	<?php endforeach; ?>
</table>

