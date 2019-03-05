<?php 

class ModelPersona extends BaseModel 
{
    // Al ser el encargado de la funcionalidad se encarga de:
    //     -funciones (Queries especificas)
    //     -atributos de la clase
    
//     Estos atributos los hereda del padre, pero es necesario redefinirlos
//     para que se los chive al padre, asi todos los modelos podran heredar del
//     baseModel y tener las mismas funciones
    protected static $lista_info = ["dni","nombre","apellido","edad"];
    
//     Al ser hijo de BaseModel extendiende sus funciones basicas:
//         -Mostrar todos los datos
//         -getById
//         -save (insert o update)

    public function getEdadActual($dni)
    {
        $db = App::getDB();//Solo devuelve la DB

        $nombre_clase = get_class($this);//Obtendra el nombre esta clase
        $nombre_tabla = strtolower(substr($nombre_clase, 5));
        $campos_para_select = implode(",",static::$lista_info);

        $resultado = $db->ejecutar("SELECT $campos_para_select FROM $nombre_tabla WHERE dni = ?;", $dni);
        //Obtengo solo el ultimo campo
        $edad = $resultado[0]["edad"];
        //Obtengo solo el anio
        $edad = substr($edad,0,4);
        //Obtengo el anio actual
        $anioActual = date("Y");
        //          = 2019 - edad
        $edadActual = $anioActual - $edad;
        
        return [new $nombre_clase($resultado[0]), $edadActual];
        // return $edadActual;
    }//getEdadActual
    
        
    
}


?>