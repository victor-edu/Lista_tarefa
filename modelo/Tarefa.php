<?php

    class Tarefa{

        private string $titulo;
        private string $data;
        private string $dataInicio;
        private string $datafim;
        private $id;
        private int $usuarioId;
        private int $statusId;

        public function __construct($titulo='',$data='',$datafim='',$dataInicio='', int $statusId = 0, int $usuarioId = 0, $id=null){
            $this->titulo=$titulo;
            $this->formatDate($data,$datafim,$dataInicio);
            $this->id = $id;
            $this->usuarioId=$usuarioId;
            $this->statusId=$statusId;
        }
        private function formatDate($data,$datafim,$dataInicio){
            $this->data=date("Y-m-d H:i:s", strtotime($data, null));
            $this->dataInicio=date("Y-m-d H:i:s", strtotime($dataInicio, null));
            $this->datafim=date("Y-m-d H:i:s", strtotime($datafim, null));
            // die;
        }
        
        public function getTitulo() {
            return $this->titulo;
        }
        public function getStatusId() {
            return $this->statusId;
        }
        public function getUsuarioId() {
            return $this->usuarioId;
        }
        public function getData() {
            return $this->data;
        }
        public function getDataInicio() {
            return $this->dataInicio;
        }
        public function getDataFim() {
            return $this->datafim;
        }
        public function getId(){
            return $this->id;
        }

        public function setTitulo($titulo){
            return $this->titulo=$titulo;
        }
        public function setData($data){
            return $this->formatDate($data);
        }
        public function setDataInicio($dataInicio){
            return $this->formatDate($dataInicio);
        }
        public function setDataFim($datafim){
            return $this->formatDate($datafim);
        }
    }

?>