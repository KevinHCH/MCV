<?php 
/**Es una clase Singleotn, se instancia un array de rutas */
class Config 
{
    private static $configuracion = array();

    public static function  get($key)
    {
        if(self::$configuracion[$key]){
            return self::$configuracion[$key];
        }else{
            return null;
        }
    }//get

    public static function set($key, $val)
    {
        self::$configuracion[$key] = $val;
    }

}//Config


?>