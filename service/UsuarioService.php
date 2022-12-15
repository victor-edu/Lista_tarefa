<?php

    class UsuarioService{

        private $conexao;

        public function __construct($conexao){
            $this->conexao = $conexao;
        }

        public function registrar(Usuario $usuario)
        {
            $senhaCriptografada = sha1(md5($usuario->getSenha()));
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('".$usuario->getNome()."', '".$usuario->getEmail()."', '$senhaCriptografada')";
            $resultQuery = mysqli_query($this->conexao, $sql);
            $novoUsuario = new Usuario();
    
            if ($resultQuery) {
               echo "Usuario cadastrado com sucesso!";
               
                       
                $novoUsuario = $this->buscar($usuario->getEmail());
    
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->conexao);
            }
            header("Location: http://localhost/projeto");
            return $novoUsuario;
        }

        public function deletar(Usuario $usuario):void
        {
            $sql = "DELETE FROM tasks_db.usuarios WHERE id = '".$usuario->getId()."'";
            $result = mysqli_query($this->conexao, $sql);
            if(!$result)
             die("Falha ao executar o comando: " . mysqli_error($this->conexao));
            else
                echo "Dados excluídos com sucesso.";
  
        }

        public function atualizar(Usuario $usuario):Usuario
        {
            $sql = "UPDATE tasks_db.usuarios SET nome = '".$usuario->getNome()."', email = '".$usuario->getEmail()."' WHERE id = '".$usuario->getId()."'";
            $result = mysqli_query($this->conexao, $sql);
            if(!$result)
             die("Falha ao executar o comando: " . mysqli_error($this->conexao));
            else
                echo "Dados editados com sucesso."; 
            
            return $usuario;
        }

        public function buscar(string $email)
        {
            # Executa a query desejada 
            $sql = "SELECT * FROM tasks_db.usuarios where email = '$email'"; 
            $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
            $arrayUsuario = mysqli_fetch_assoc($resultQuery);
            $usuario=new Usuario();
            if ($arrayUsuario != null) {
                
                $usuario = new Usuario($arrayUsuario['nome'], $arrayUsuario['email'], $arrayUsuario['senha'], $arrayUsuario['id']);
            }
            return $usuario;

        }
        public function buscarIdUsuario(string $email)
        {
            # Executa a query desejada 
            $sql = "SELECT id FROM tasks_db.usuarios where email = '$email'"; 
            $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
            $arrayUsuario = mysqli_fetch_assoc($resultQuery);
            $usuario=null;
            if ($arrayUsuario != null) {
                
                $usuario = $arrayUsuario['id'];
            }
            return $usuario;

        }

        public function buscarTodos()
        {
            $sql = "SELECT * FROM tasks_db.usuarios";
            $resultQuery = mysqli_query( $this->conexao, $sql ) or die(' Erro na query:' . $sql . ' ' . mysqli_error($this->conexao) );
            return mysqli_fetch_all($resultQuery);
        }

    }