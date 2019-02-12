<?php 
// ModelXXX::getAll()
// ModelXXX::getAll(1,10)
// ModelXXX::getFilterByYYYYY('ordenadores',1,10)

// Dara todas las noticias con la palabra Trump
// ModelNoticia::getFilterByTexto('Trump') 
// getFilter => Sera la consulta y el "por..." sera el where de la consulta.
// De esta manera se haran las consultas dinamicas

// ModelNoticia::getTitulo("Noticia");
class ModelNoticia extends BaseModel 
{
    protected static $lista_info = ['id','titulo','texto','fecha'];

    public function save()
    {
        if ($this->id == null) {
            $resultado = $this->db->ejecutar("insert into noticias (titulo, texto, fecha) 
                                values (?,?,?)", 
                                $this->titulo, $this->texto, $this->fecha);
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
    
    // public static function getAllNoticias($page = 0, $num = 10)
    // {
    //     $db = App::getDB();//Solo devuelve la DB
    //     $resultado = $db->ejecutar("select id, titulo, texto, fecha from noticias");
    //     $resultado = array_map(function($datos) {
    //         return new ModelNoticia($datos);
    //     },$resultado);
    //     return $resultado;
    // }//getAllNoticias
}//ModelNoticia



?>