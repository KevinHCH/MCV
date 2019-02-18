<?php

class ModelNoticiaForm
{
    private $errores = [];
    private $datos = [];
    private $valorDefecto;
    private $contieneErrores;
    private $noticia;

    private function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    function __construct($data_post){
        $this->valorDefecto=false;
        $this->contieneErrores=false;
        $this->errores['titulo'] = "";
        $this->errores['texto'] = "";
        $this->errores['fecha'] = "";

        if(!isset($data_post['titulo'])){
            $data_post['titulo']="";
            $this->valorDefecto=true;
        } else {
            if(strlen($data_post['titulo'])<10){
                $this->errores['titulo']="Error en el título, debe contener al menos 10 caracteres.";
                $this->contieneErrores=true;
            }
        }

        if(!isset($data_post['texto'])){
            $data_post['texto']="";
            $this->valorDefecto=true;
        } else {
            if(strlen($data_post['texto'])<30){
                $this->errores['texto']="Error en el texto, debe contener al menos 30 caracteres.";
                $this->contieneErrores=true;
            }
        }

        if(!isset($data_post['fecha'])){
            $data_post['fecha']="";
            $this->valorDefecto=true;
        } else {
            if(!$this->validateDate($data_post['fecha'])){
                $this->errores['fecha']="Introduzca una fecha valida.";
                $this->contieneErrores=true;
            }
        }

        $this->datos = $data_post;

        if($this->datosValidos()){

            $data = ['id' => null];
            $data = array_merge($data, $data_post);
            $noticia = new ModelNoticia($data);
            $this->noticia = $noticia;
        }
    }

    function datosValidos(){
        return !$this->valorDefecto && !$this->contieneErrores;
    }

    function getNoticia(){
        return $this->noticia;
    }

    function getTitulo(){
        return $this->datos['titulo'];
    }

    function getErrorTitulo(){
        return $this->errores['titulo'];
    }

    function getTexto(){
        return $this->datos['texto'];
    }

    function getErrorTexto(){
        return $this->errores['texto'];
    }

    function getFecha(){
        return $this->datos['fecha'];
    }

    function getErrorFecha(){
        return $this->errores['fecha'];
    }
}

?>
