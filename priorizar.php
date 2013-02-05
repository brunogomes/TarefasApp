<?php

  $id_tarefa = $_POST['id'];;
  $user_id = 1;

  $dbc = mysqli_connect('localhost', 'root', '', 'tarefasapp') or die('Erro conexao BD');

  $query = "UPDATE tarefas SET priorizado = 1 WHERE users_id = $user_id AND priorizado = 0";
          

  mysqli_query($dbc, $query) or die('Erro consulta BD');

  $query = "UPDATE tarefas SET priorizado = 0 WHERE users_id = $user_id AND id = '$id_tarefa'"; 
  mysqli_query($dbc, $query) or die('Erro consulta BD');

  mysqli_close($dbc);
  header( 'Location: lista_tarefas.php') ;
?>