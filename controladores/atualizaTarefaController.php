<?php
  
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');

   $tituloAtualiza=$_POST["tituloAtualiza"];
   $dataInicialAtualiza= $_POST["dataInicialAtualiza"];
   $dataFinalAtualiza= $_POST["dataFinalAtualiza"];
   $idTarefa= $_POST["idTarefa"];

   $TarefaService = new TarefaService($conexao);

   $TarefaService->atualizarTarefa($tituloAtualiza,$dataInicialAtualiza,$dataFinalAtualiza,$idTarefa);














?>