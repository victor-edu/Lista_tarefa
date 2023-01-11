<?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');
  
  session_start();

  $Idusuario=$_SESSION['id'];
  $titulo=$_POST["titulo"];
  $dataInicial= $_POST["dataInicial"];
  $dataFinal= $_POST["dataFinal"];
  

  $TarefaService = new TarefaService($conexao);
  $status=1;

  date_default_timezone_set('America/Sao_Paulo');
  $data=date('Y-m-d H:i:s');
  
  
  if ($Idusuario!=null) {
    $TarefaService->registrarTarefa(new Tarefa($titulo,$data, $dataInicial,$dataFinal,$status,$Idusuario));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
  }
  echo "Erro 500";
?>
  
