<?php

    class StatusTarefa{

        private string $descricao;

        public function __construct($descricao='')
        {
            $this->descricao=$descricao;
        }

        public function getDescricao()
        {
            return $this->descricao;
        } 

        public function fatDescricao($descricao)
        {
            return $this->descricao=$descricao;
        }
    }