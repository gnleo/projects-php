
<form method="POST">

	<input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>"/>
	<fieldset>
		
		<legend>Nova Tarefa</legend>
		<label>
			Tarefa: 
			<?php if($erro && isset($erro_validacao['nome'])): ?>
				<span class="erro"> <?php echo $erro_validacao['nome']; ?> </span>
			<?php endif; ?>
			<input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>"/>
		</label>

		<label>
			Descrição (opcional):
			<textarea name="descricao"><?php echo $tarefa['descricao']; ?></textarea>	
		</label>

		<label>
			Prazo (opcional):
			<?php if($erro && isset($erro_validacao['prazo'])): ?>
				<span class="erro"> <?php echo $erro_validacao['prazo']; ?> </span>
			<?php endif; ?>
			<input type="text" name="prazo"value="<?php echo traduz_data_exibicao($tarefa['prazo']); ?>"/>
		</label>

		<label>
			Prioridade *
			<input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade'] == 1)? 'checked' : ''; ?>/> Baixa

			<input type="radio" name="prioridade" value="2" <?php echo ($tarefa['prioridade'] == 2)? 'checked' : ''; ?>/> Media

			<input type="radio" name="prioridade" value="3" <?php echo ($tarefa['prioridade'] == 3)? 'checked' : ''; ?>/> Alta
		</label>

		<label>
			Tarefa concluída:
			<input type="checkbox" name="concluida" value="1" <?php echo($tarefa['concluida'] == 1)? 'checked' : ''; ?>/>
		</label>

	</fieldset>

	<input type="submit" value="<?php echo($tarefa['id'] > 0)? 'Atualizar' : 'Cadastrar';?>"/>	
</form>
