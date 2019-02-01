<?php 

class ControllerNoticias extends BaseController
{
    public function list()
    {
        // Trabajo con modelos
        // Aqui se asignan los datos obtenidos de ls BBDD
        $this->data = [
            "noticia1",
            "noticia2",
            "noticia3",
        ];
    }    
    // Funcion que mostrara una noticia en concreto con el ID pasado
    public function show($id)
    {
        $datos_modelo = [
            "noticia1",
            "noticia2",
            "noticia3",
        ];
        
        // Se vuelve a castear los $datos_modelo, ya que antes eran una cadena

        // El id se le pasa como param dentro de noticias: http://mvc-todo.io/noticias/show/0
        // Al ser un array, se usan los ids de arrays
        $this->data = [$datos_modelo[$id]];
    }
}//ControllerDWES


?>
