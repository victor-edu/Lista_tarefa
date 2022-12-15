<?php

$hostname= "localhost";
$bancodedados="tasks_db";
$usuario= "root";
$senha="";

$conexao=new MySQLi  ($hostname, $usuario, $senha, $bancodedados);
if($conexao->connect_errno){
    echo "erro";
}
