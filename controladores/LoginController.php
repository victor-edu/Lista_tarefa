<?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\UsuarioService.php');
  require_once('..\modelo\Usuario.php');
  require_once('..\service\Autenticador.php');
  
  session_start();  
    
    $email= $_POST["email_login"];
    $senha= $_POST["senha_login"];
 
     $usuarioService = new UsuarioService($conexao);
    $autenticador=new Autenticador($usuarioService);
    $Idusuario=$usuarioService->buscarIdUsuario($email);

    if ($autenticador->login($email,$senha)!=null) {
      
      $_SESSION["id"]= $Idusuario;  
      $_SESSION["email"]= $email;  
      header("Location: http://localhost:8000/site/site-tarefa.php");
      exit;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    
?>
