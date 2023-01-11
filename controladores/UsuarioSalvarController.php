<?php
  require_once ('..\banco\conexao.php');
  require_once('..\service\UsuarioService.php');
  require_once('..\modelo\Usuario.php');

  $nome= $_POST["nome_cad"];
  $email= $_POST["email_cad"];
  $senha= $_POST["senha_cad"];

  $usuarioService = new UsuarioService($conexao);
  $usuarioService->registrar(new Usuario($nome,$email,$senha));
  header("Location: http://localhost:8000/");


      
        
       
?>