<?php 

class BaseModel  
{
    protected $db;
    // Lista de atributos que tengo, que se heredaran a mis hijos
    protected static $lista_info;
    private $data;

    public function __construct($data_row = []) 
    {
        $this->db = App::getDB();
        // self::$lista_info = ['id','titulo',+'texto','fecha'];

        // Si me pasan datos en el constructor
        //     completo los datos en mi $lista_info, que es mi lista de datos que se
        //     iran metiendo en mi DB
        if (count($data_row) == 0) {
            $this->data = array_fill_keys(static::$lista_info,null);
        }
        // Si no 
        //     combina los datos de data_row con lista_info por que tienes datos en el constructor
        else{
            $this->data = array_combine(static::$lista_info, $data_row);
        }
    }//construct
    public function estaEnListaDatos($nombre)
    {
        return in_array($nombre, static::$lista_info);
    }
    /**
     * Esta es la invocacion de los objetos
     * setAlgo, setOtracosa
     * getAlgo, getOtracosa
     */
    public function __call($nombre,$dato)
    {
        $dato_pedido = strtolower(substr($nombre,3));
        $accion = substr($nombre, 0 , 3);
        if (!$this->estaEnListaDatos($dato_pedido)) {
            return "Error";
        }//if

        if ($accion == "get") {
            return $this->data[$dato_pedido];
        }else if ($accion == "set") {
            // En esta linea se obtiene el primer valor del array (como el titulo)
            // para evitar que el usuario te meta un array completo
            return $this->data[$dato_pedido] = $dato[0];
        }//else
    }//__call

    public static function getAll($page = 0, $num = 10)
    {
        $db = App::getDB();//Solo devuelve la DB

        $nombre_clase = get_called_class();//Obtendra el nombre de mis hijos
        $nombre_tabla = strtolower(substr($nombre_clase, 5));
        $campos_para_select = implode(",",static::$lista_info);

        $resultado = $db->ejecutar("SELECT $campos_para_select FROM $nombre_tabla;");
        $resultado = array_map(function($datos) {
            $nombre_clase = get_called_class();//Obtendra el nombre de mis hijos
            return new $nombre_clase($datos);
        },$resultado);
        return $resultado;
    }//getAllNoticias
    

    public static function getById($id)
    {
        $db = App::getDB();//Solo devuelve la DB

        $nombre_clase = get_called_class();//Obtendra el nombre de mis hijos
        $nombre_tabla = strtolower(substr($nombre_clase, 5));
        $campos_para_select = implode(",",static::$lista_info);

        $resultado = $db->ejecutar("SELECT $campos_para_select FROM $nombre_tabla WHERE id = ?;", $id);
        return new $nombre_clase($resultado[0]);
    }//getById

    public function save()
    {
        $db = App::getDB();//Solo devuelve la DB

        $nombre_clase = get_called_class();//Obtendra el nombre de mis hijos
        $nombre_tabla = strtolower(substr($nombre_clase, 5));
        $campos_para_insert = implode(",",array_slice(static::$lista_info,1));
        $parametros_para_insert = implode(",",array_fill(0,count(static::$lista_info -1), "?"));

        if ($this->getId() == null) {
            $sql_insert = "INSERT INTO noticias ($campo_para_inssert) VALUES ($parametros_para_insert)";

            $resultado = $this->db->ejecutar($sql_insert, ...array_values(array_slice($this->data,1)));

            if (is_array($resultado)) {
                $this->setId($this->db->getLastId());
                $resultado []= $this->getId();
            }
            return $resultado;
            
        }else{
            $resultado = $this->db->ejecutar("update noticias 
                                set titulo = ?,
                                texto = ?,
                                fecha = ?
                                where id = ?",
                                $this->titulo,
                                $this->texto,
                                $this->fecha,
                                $this->id
                              );
            if (is_array($resultado)) {
                $this->setId($this->db->getLastId());
                $resultado []= $this->getId();
            }
            return $resultado;
        }//else
    }//save
    
}//BaseModel


?>