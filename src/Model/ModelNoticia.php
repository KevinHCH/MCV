<?php 

// ORM: Elementos del MVC que te permite un mapeo de la DB
//     Object 
//     Relational 
//     Maping

// Los ORMs simplifican las consultas de manera que almacenan las 
// consultas mas frecuentes en funciones que se podran llamar cuando
// el cliente las pida por url
// EJ:
//     ModelNoticia::getNoticia();
//     ModelNoticia::getNoticiaDesde('2019/01/01',2);
//     ModelNoticia::getById();

//     $noticia->getTitulo();
//     $noticia->setTexto('lorem...');

//     $noticia->save();

class ModelNoticia extends BaseModel 
{
    private $id;
    private $titulo;
    private $texto;
    private $fecha;
    
    public function getTitulo()
    {
        return $this->titulo;
    }//getTitulo

    public function getTexto()
    {
        return $this->texto;
    }//getTexto

    public function getFecha()
    {
        return $this->fecha;
    }//getFecha

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }//setTitulo

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }//setTexto

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }//setFecha

    public function save()
    {
        if ($this->id == null) {
            return $this->db->ejecutar("insert into noticias (titulo, texto, fecha) 
                                values (?,?,?)", 
                                $this->titulo, $this->texto, $this->fecha);
            
        }else{
            return $this->db->ejecutar("update noticias 
                                set titulo = ?,
                                texto = ?,
                                fecha = ?
                                where id = ?",
                                $this->titulo,
                                $this->texto,
                                $this->fecha,
                                $this->id
                              );
        }//else
    }
}//ModelNoticia



?>