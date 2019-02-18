<?php 

class ModelTienda extends BaseModel 
{
    protected static $lista_info = ['id','prenda','talla','precio', 'img', 'fecha'];
    // Si quiero hacer una consulta en concreto tengo que establecersela al padre
    public function getByName($prenda)
    {
        $db = App::getDB();//Solo devuelve la DB

        // $nombre_clase = get_called_class();//Obtendra el nombre de mis hijos
        $nombre_clase = get_class($this);//Obtendra el nombre de la clase
        $nombre_tabla = strtolower(substr($nombre_clase, 5));
        $campos_para_select = implode(",",static::$lista_info);

        $resultado = $db->ejecutar("SELECT $campos_para_select FROM $nombre_tabla WHERE prenda = ?;", $prenda);
        return new $nombre_clase($resultado[0]);
    }
}


?>