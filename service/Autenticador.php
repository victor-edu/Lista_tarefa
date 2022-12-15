<?php

    class Autenticador{

        private $usuarioService;

        public function __construct(UsuarioService $usuarioService){

            $this->usuarioService=$usuarioService;
       
        }

        public function login($email, $senha)
        {
            $usuario=$this->usuarioService->buscar($email);
            
            if(!is_null($usuario->getId()) && (sha1(md5($senha)) === $usuario->getSenha())) {
                echo "Usuario autenticado";
               
                return true;
            }

            echo "Usuario ou senha invalidos";
            return false;
        }
    }