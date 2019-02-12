<?php 
class ModelNew extends BaseModel 
{
    private $info_list = [];

    public function __construct($titulo,$texto,$fecha) 
    {
        parent::__construct();
        $this->info_list["id"] = "";
        $this->info_list["titulo"] = $titulo;
        $this->info_list["texto"] = $texto;
        $this->info_list["fecha"] = $fecha;
    }//construct
    public function __set($name, $value)
    {
        $this->info_list[$name] = $value;
    }//__set
    public function __get($value)
    {
        return $this->info_list[$value];
    }//__get

    public function save()
    {
        
        if ($this->id == null) {
            $resultado = $this->db->ejecutar("insert into noticia (titulo, texto, fecha) 
                                values (?,?,?)", 
                                $this->titulo, $this->texto, $this->fecha);
            if (is_array($resultado)) {
                $this->id = $this->db->getLastId();
                $resultado []= $this->id;
            }
            return $resultado;
            
        }else{
            $resultado = $this->db->ejecutar("update noticia 
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
    /**Funcion que permite realizar una consulta a la base de datos
     * @param $query: Consulta que se hara a la BBD
     * @param $values: Valores que se le pasan a la consulta
     * Devolvera los datos obtenidos, es necesario almacernarlos en una variable
     */
    public function getQueryData($query, $values = [])
    {
        if ($this->id == null) {
            $resultado = $this->db->ejecutar($query,$values);
            if (is_array($resultado)) {
                $this->id = $this->db->getLastId();
                $resultado []= $this->id;
                print_r($resultado);
                return $resultado;
            }
            
        }
    }//getQueryData
}//ModelNew


?>