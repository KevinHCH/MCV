<?php 
// Al ser todos los meotodos statics, solo se podra hacer una instancia de la clase
class App  
{
    private static $enrutador;

    public static function getRouter()
    {
        return self::$enrutador;
    }
    public static function run($uri)
    {
        self::$enrutador = new Router($uri);

        $controlador = self::$enrutador->getControlador();
        $accion = self::$enrutador->getAccion();
        $params = self::$enrutador->getParams();

        // Ponemos al "controller" en una string, es una mala practica
        // pero es importante tenerlo en cuenta en el despliegue de una App

        // Esta es la url que buscara el init, la buscara enla carpeta Controller y 
        // buscara la clase con ese nombre en los controladores
        $clase_controlador = "Controller".ucfirst($controlador);

        $objeto_controlador = new $clase_controlador();
        
        if (method_exists($objeto_controlador, $accion)) {
            $salida = $objeto_controlador->procesaAccion($accion, $params);
        }else{
            throw new Exception("El metodo $accion no exsite");
        }
        echo $salida;
    }
}//App


?>