<?php

/** 
 * Controlador base que heredaran el resto de controladores
*/
class BaseController  
{
    protected $data;

    public function __construct() {
        $this->data = [];
    }
    // Esta funcion rellenara los datos
    public function procesaAccion($metodo, $parametros)
    {
        // Al poner los "..." al principio, hace que los parametros
        // sean variables que se iran pasando 1 a 1
        $this->$metodo(...$parametros);
        $salida = "<h1>Salida general</h1>";
        $salida .= implode("-",$this->data);
        return $salida;
    }
}


?>

