<?php

class View  
{
    private $data;
    private $template;

    public function __construct() {
        $enrutador = App::getRouter();

        $this->template = $enrutador->getControlador().DS.$enrutador->getAccion().".phtml";
        if (!file_exists($this->template)) {
            throw new Exception("Error template no encontrado");
            
        }
    }
}


?>