<?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\TarefaService.php');
  require_once('..\modelo\Tarefa.php');
  require_once('..\service\UsuarioService.php');
  require_once('..\modelo\Usuario.php');
  
  $titulo=$_POST["titulo"];
  $dataInicial= $_POST["dataInicial"];
  $dataFinal= $_POST["dataFinal"];
  $usuarioService = new UsuarioService($conexao);
  $Idusuario=$usuarioService->buscarIdUsuario("viictoredu74@gmail.com");
  $tarefa=1;
  date_default_timezone_set('America/Sao_Paulo');
  $data=date('Y-m-d H:i:s');
  
  
  $TarefaService = new TarefaService($conexao);
  $quantidade=$TarefaService->buscarTodasTarefas();
  
  if ($Idusuario!=null) {
    $TarefaService->registrarTarefa(new Tarefa($titulo,$data, $dataInicial,$dataFinal,$tarefa,$Idusuario));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
  }
  echo "Erro 500";
?>
  
