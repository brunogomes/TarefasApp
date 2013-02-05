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

  if(isset($_POST['remover'])){
    if($_POST['removido'] == 'Sim'){
    $dbc = mysqli_connect('localhost', 'root', '', 'tarefasapp') or die('Erro conexao BD');
    $user_id = 1;
    $id_tarefa = $_POST['id_tarefa'];
    $query = "DELETE FROM tarefas WHERE users_id = $user_id AND id = '$id_tarefa";
    $result = mysqli_query($dbc, $query)
      or die('Error querying database.');

    echo "Tarefa deletada";
    echo '<form method="post" action="lista_tarefas.php">';
    echo    '<input type="submit" value="OK" name="" />';
    echo '</form>';

    }else{
       header( 'Location: lista_tarefas.php') ;
    }


  }else{
    $id_tarefa = $_GET['id'];
    
    if(isset($id_tarefa)){

      echo '<p>Deseja realmente exluir a tarefa a seguir?</p>';
      echo '<p><strong>Descrição: </strong>' . $descricao . '<br /><strong>Data: </strong>' . $data .'<br />';
      echo '<form method="post" action="remover_tarefas.php">';
      echo '<input type="radio" name="removido" value="Sim" /> Sim ';
      echo '<input type="radio" name="removido" value="Nao" checked="checked" /> Não <br />';
      echo '<input type="submit" value="Ok" name="remover" />';
      echo '<input type="hidden" name="id_tarefa" value="' . $id_tarefa . '" />';
      echo '</form>';
    }
  }
?>
</body>
</html>