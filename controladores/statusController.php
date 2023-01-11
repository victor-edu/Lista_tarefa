<?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');

  $status=$_POST["idStatus"];    
  $tarefa=$_POST["idTarefa"];

  $tarefaService = new TarefaService($conexao);

  $tarefaService->atualizarStatus($status, $tarefa);
?>