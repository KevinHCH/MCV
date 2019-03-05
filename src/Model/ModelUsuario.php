<?php 

class ModelUsuario extends BaseModel 
{
    protected static $lista_info = ["id", "nombre_usuario", "email", "pass"];
    public static function getByName($nombre)
    {
        $db = App::getDB();//Solo devuelve la DB

        $nombre_clase = get_class();
        
        $nombre_table = strtolower(substr($nombre_clase, 5));
        $camposSelect = implode(',', static::$lista_info);

        $resultado = $db->ejecutar("SELECT $camposSelect FROM $nombre_table WHERE email = ?",$nombre);
        if (empty($resultado)) {
            return $resultado;
        }else{
            return $resultado[0];
        }

    }//getByName

}//ModelUsuario

?>