<?php 

class ControllerNoticias extends BaseController
{
    public function list()
    {
        // Trabajo con modelos
        // Aqui se asignan los datos obtenidos de ls BBDD
        $this->data = ModelNoticia::getAll();
        // Estos son algunos de los ejemplos que podria tener nuestra Aplicacion
        // ModelNoticias::getNoticias();
        // ModelNoticias::getNoticias($pagina=1);
        // ModelNoticias::getNoticiasPublicadas();

        // $noticia = ModelNoticias::getById(47);
        // $noticia = ModelNoticias::getLastByAuthor('George');

        // $noticia = new ModelNoticia();
        // $noticia->setTitle('Lanzamiento de mi MVC');
        // $noticia->setAuthor(1);

        // $noticia->getContent(1);
        // $noticia->save();

        // ModelNoticias::deleteById(3);
        // $noticias = ModelNoticias::getById(47);
        // $noticia->delete();

    }//list
    // Funcion que mostrara una noticia en concreto con el ID pasado
    public function show($id)
    {
        $this->data["perfil"] = "Kevin";
        $this->data["publicidad"] = "Solan";
        $this->data["noticia"] = ModelNoticia::getById($id);

        // $datos_modelo = [
        //     "Noticia 1:<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eaque dolor vero perspiciatis, corrupti est officia beatae nisi? Voluptatibus nostrum commodi accusamus expedita iure quod non voluptates iste aliquam distinctio.",
        //     "Noticia 2:<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eaque dolor vero perspiciatis, corrupti est officia beatae nisi? Voluptatibus nostrum commodi accusamus expedita iure quod non voluptates iste aliquam distinctio.",
        //     "Noticia 3:<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eaque dolor vero perspiciatis, corrupti est officia beatae nisi? Voluptatibus nostrum commodi accusamus expedita iure quod non voluptates iste aliquam distinctio.",
        // ];
        
        // // Se vuelve a castear los $datos_modelo, ya que antes eran una cadena

        // // El id se le pasa como param dentro de noticias: http://mvc-todo.io/noticias/show/0
        // // Al ser un array, se usan los ids de arrays
        // $this->data["titulo"] = "algo";
        // $this->data["id"] = $id;
        // $this->data["contenido"] = $datos_modelo[$id];
    }//show
}//ControllerDWES


?>
