
<!-- LAYOUT DA PAGINA -->


<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Gerenciador de tarefas</title>
	<link rel="stylesheet" type="text/css" href="css/tarefas.css">
</head>

<body>

	<h2>Gerenciador de tarefas</h2>
	
	<?php include "1_formulario.php"; ?>

	<?php if($exibir_tabela): ?>
		<?php include "1_tabela.php"; ?>
	<?php endif; ?>

	
</body>
</html>

