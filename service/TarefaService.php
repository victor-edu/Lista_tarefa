<?php

class TarefaService {

    private $conexao;

    public function __construct($conexao){
        $this->conexao=$conexao;
    }

    public function registrarTarefa(Tarefa $tarefa)
    {
        $sql= "INSERT INTO tarefas(titulo, data_criacao, data_inicio, data_fim, usuarios_id, status_tarefas_id) 
        VALUES ('".$tarefa->getTitulo()."','".$tarefa->getData()."','".$tarefa->getDataInicio()."','".$tarefa->getDataFim()."','".$tarefa->getUsuarioId()."','".$tarefa->getStatusId()."')";
        $resultQuery = mysqli_query($this->conexao, $sql);
        
        $idTarefa = mysqli_insert_id($this->conexao);
        
        $tarefaRegistrada=new Tarefa();

        if ($resultQuery) {
            echo "Tarefa cadastrado com sucesso!".PHP_EOL;
            $tarefaRegistrada = $this->buscarTarefa($idTarefa);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conexao);
        }
        mysqli_close($this->conexao);

        return $tarefaRegistrada;

    }
    public function deletarTarefa($id):void
    {
        $sql = "DELETE FROM tasks_db.tarefas WHERE id = '".$id."'";
        $result = mysqli_query($this->conexao, $sql);
        if(!$result)
         die("Falha ao executar o comando:" . mysqli_error($this->conexao));
        else
            echo "Dados excluídos com sucesso.";

        // fecha a conexão
        mysqli_close($this->conexao);   
    }
    public function atualizarTarefa($tituloAtualiza,$dataInicioAtualiza,$dataFinalAtualiza,$idTarefa)
    {
        $sql = "UPDATE tasks_db.tarefas SET titulo = '".$tituloAtualiza."', data_inicio = '".$dataInicioAtualiza."', data_fim= '".$dataFinalAtualiza."' WHERE id = '".$idTarefa."'";
        $result = mysqli_query($this->conexao, $sql);
        if(!$result)
         die("Falha ao executar o comando: " . mysqli_error($this->conexao));
        else
        header("Location: http://localhost:8000/site/site-tarefa.php");

        // fecha a conexão
        mysqli_close($this->conexao);  
    }
    public function buscarTarefa($id):Tarefa
    {
        
        $sql = "SELECT * FROM tasks_db.tarefas where id = '$id'"; 
        $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
        $arrayTarefa = mysqli_fetch_assoc($resultQuery);      
        $tarefa = new Tarefa( $arrayTarefa['titulo'],$arrayTarefa['data_criacao'], $arrayTarefa['data_inicio'], $arrayTarefa['data_fim'] , $arrayTarefa['status_tarefas_id'],$arrayTarefa['usuarios_id'],$arrayTarefa['id']);
        
        return $tarefa;
    }
    public function buscarTodasTarefas()
    {
        $sql = "SELECT * FROM tasks_db.tarefas";
        $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
        return mysqli_fetch_all($resultQuery);
    }
    public function buscaPorUsuario($id)
    {
        $sql = "SELECT t.id, t.titulo, t.data_inicio, t.data_fim, t.status_tarefas_id , st.descricao as status FROM tarefas as t
        inner join status_tarefas as st on st.id = t.status_tarefas_id where usuarios_id = $id ORDER BY t.id DESC";
        $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
        return mysqli_fetch_all($resultQuery, MYSQLI_ASSOC);
        
    }
    public function atualizarStatus($status, $idTarefa)
    {
        $sql = "UPDATE tarefas SET status_tarefas_id = '".$status."' WHERE id = '".$idTarefa."'";
        $result = mysqli_query($this->conexao, $sql);
        if(!$result)
         die("Falha ao executar o comando: " . mysqli_error($this->conexao));
        // fecha a conexão
        mysqli_close($this->conexao);  
    }

}
