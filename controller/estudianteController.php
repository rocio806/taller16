<?php
    class estudianteController{
        private $model;

        public function __construct(){
            include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp13/routes.php');
            require_once(MODEL_PATH.'estudianteModel.php');
            $this->model = new estudianteModel();
        }

        public function insert($nombre,$apellido,$idCurso){
            $id = $this->model->insertar($nombre,$apellido,$idCurso);
            return ($id!=false) ? header('location: ./index.php'): header ('location: ./create.php');
        }

        public function update($id,$nombre,$apellido,$idCurso){
            return ($this->model->actualizar($id,$nombre,$apellido,$idCurso) !=false) ? header('location: ./index.php'): header ('location: ./edit.php?id='.$id);
        }

        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php'): header ('location: ./index.php');
        }

        public function search($id){
            return ($this->model->buscar($id)) !=false ? $this->model->buscar($id): header ('location: ./index.php');

        public function select(){
            return ($this->model->listar()) ? $this->model->listar(): false;
        }
        public function combolist(){
            return ($this->model->cargarDesplegable()) ? $this->model->cargarDesplegable(): false;
        }


    }
?>