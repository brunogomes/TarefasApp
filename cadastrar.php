<html>
<head>
</head>
<body>
	<h1>Cadastro</h1>

<?php 

	if(!isset($_POST['id'])){
		echo '<form method="POST" action="cadastro_tarefas.php">';
		echo '<label for="Tarefa">Tarefa</label><br \>';
		echo '<input type="text" style="WIDTH: 228px; HEIGHT: 98px"  id="descricao" name="descricao"/><br />';
		echo '<input type="submit" value="Cadastrar" name="submit" />';
		echo '</form>';
	}else{
		echo '<form method="POST" action="cadastro_tarefas.php">';
		echo '<label for="Tarefa">Tarefa</label><br \>';
		echo '<input type="text" style="WIDTH: 228px; HEIGHT: 98px"	 id="descricao" name="descricao" value="' . $_POST['descricao'] . '"/><br />';
		echo '<input type="submit" value="Cadastrar" name="submit" />';
		echo '<input type="hidden" value="editar" name="editar" />';
		echo '</form>';
	}
?>
</body>

</html>