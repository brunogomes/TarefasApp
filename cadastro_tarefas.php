<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cadastro Tarefas</title>
</head>
<body>
  <h2>Cadastro</h2>

<?php
  $data = $_POST['data'];
  $descricao = $_POST['descricao'];
  $user_id = 1;

  $dbc = mysqli_connect('localhost', 'root', '', 'tarefasapp') or die('Erro conexao BD');

  $query = "INSERT INTO tarefas (descricao, data, users_id) VALUES ('$descricao', '$data', '$user_id')";

  $result = mysqli_query($dbc, $query) or die('Erro consulta BD');

  mysqli_close($dbc);

  echo "Cadastro realizado com sucesso!";
  
?>

</body>
</html>
