<?php

    require_once ('..\banco\conexao.php');
    require_once('..\service\TarefaService.php');
    require_once('..\modelo\Tarefa.php');

    $id=$_POST["deleteItem"];

    $TarefaService = new TarefaService($conexao);

    $TarefaService->deletarTarefa($id);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;


















?>