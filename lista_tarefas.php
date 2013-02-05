<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Tarefas App</title>
</head>
<body>
  <h2>Lista de Tarefas</h2>

<?php 
  $dbc = mysqli_connect('localhost', 'root', '', 'tarefasapp') or die('Erro conexao BD');
  $user_id = 1;
  $query = "SELECT * FROM tarefas WHERE users_id = $user_id ORDER BY concluido";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

if(!isset($_POST['checktest'])){

  echo '<table>';
  echo '<tr><td>#</td><td>Tarefa</td><td>Data</td><td>Feita</td></tr>';
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr></tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['descricao'] . '</td>';
    echo '<td>' . $row['data'] . '</td>';
    echo '<td>';
    echo '<form method="post" name="conclusao' .  $row['id'] . '" action="lista_tarefas.php">';
    if($row['concluido']){
     echo '<input type="checkbox" name="checktest" value="' .  $row['id'] . '"onclick="document.conclusao' .  $row['id'] . '.submit ();">';
    }else{
     echo '<input type="checkbox" name="checktest" value="' .  $row['id'] . '" onclick="document.conclusao' .  $row['id'] . '.submit ();">';
    }
    echo '</form>';
    echo '</td>';
    echo '<td><button><a href="remover_tarefas.php?id=' . $row['id'] . '"' . '>Remover</a></td>';
    echo '<td>' . $row['concluido'] . '</td>';
    echo '</tr>'; 
  }
  echo '</table>';
}else{
  $id_tarefa = $_POST['checktest'];
  $query = "UPDATE tarefas SET concluido = !concluido WHERE users_id = $user_id AND id = '$id_tarefa'";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');
 header( 'Location: lista_tarefas.php');
}

?>

<button><a href="cadastro_tarefas.html">Cadastrar Nova Tarefa</a></button>
</body>
</html>
