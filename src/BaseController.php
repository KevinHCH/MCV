<?php

/** 
 * Controlador base que heredaran el resto de controladores
*/
class BaseController  
{
    protected $data;

    public function __construct($data = array()) {
        $this->data = $data;
    }
    // Esta funcion rellenara los datos
    public function procesaAccion($metodo, $parametros)
    {
        // Al poner los "..." al principio, hace que los parametros
        // sean variables que se iran pasando 1 a 1
        $this->$metodo(...$parametros);
        $vista = new View($this->data);
        
        return $vista->render($this->data);
    }//procesaAccion
    
}//BaseController


?>

