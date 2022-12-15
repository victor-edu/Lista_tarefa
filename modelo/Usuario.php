<?php

    class Usuario{

        private $id;
        private string $nome;
        private string $email;
        private string $senha;

        public function __construct($nome = '', $email = '', $senha = '', $id = null){
            
            $this->validaEmail($email);
            $this->validaSenha($senha);
            $this->nome=$nome;
            $this->email=$email;
            $this->senha=$senha;
            $this->id = $id;
        }

        private function validaSenha($senha){
            if (strlen($senha)<8 && $senha != '') {
                echo 'A senha precisa ter no minimo 5 caracteres';
                exit();
            }
        }
        private function validaEmail($email){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
                echo 'Email invalido';
                exit();
            }
        }
        
        public function getId(){
            return $this->id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSenha(){
            return $this->senha;
        }

        public function setNome($nome){
            $this->nome=$nome;
        }
        public function setSenha($senha){
            $this->validaSenha($senha);
            $this->senha=$senha;
        }
        public function setEmail($email){
            $this->validaEmail($email);
        }
    }    
    


?>