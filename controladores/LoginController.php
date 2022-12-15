<?php

  require_once ('..\banco\conexao.php');
  require_once('..\service\UsuarioService.php');
  require_once('..\modelo\Usuario.php');
  require_once('..\service\Autenticador.php');

    $senha= $_POST["senha_login"];
    $email= $_POST["email_login"];

    $usuarioService = new UsuarioService($conexao);
    $autenticador=new Autenticador($usuarioService);
    if (!$autenticador->login($email,$senha)) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      return;
    }
    header("Location: http://localhost:8000/site/site-tarefa.php");
    
    
?>
