<?php 

class ControllerPersona extends BaseController
{
//     El controlador es quien se encarga de comunicar / recuperar
//     las funciones  y el resultado obtenido por el Modelo
//     y a su vez se los envia a la vista

        // El nombre de la funcion es el nombre que se introducira en la URL
        // para el acceso a ese recurso

        public function saberEdad($dni)
        {
            // Es necesario instanciar un objeto de tipo persona para poder
            // acceder a las funciones propias de esa clase, ya  que  al no ser
            // staticas, solo se heredan en la instanciacion
            $p = new ModelPersona();
            $this->data["persona"] = $p->getEdadActual($dni);
        }//saberEdad

        public function addPersona()
        {
            // Funcion addPersona que nunca hara NADA.
            //     -No funciona por que en la funcion Save se ha establecido que eliminara
            //     el primer valor del array de atributos, al tener una tabla Persona con DNI
            //     como primary_key ya estas eliminando un campo importante, sin el cual la query nunca se inserta
            //     -Solucion: Hacer otra funcion Save desde el ModelPersona, pero no funcionara
            //     por que en el baseForm, se establece que comprobara que los campos
            //     no esten vacios y se hara el guardado desde ahi
            $form = new ModelPersonaForm($_POST);
                
            if (count($_POST) > 0 && $form->datosValidos()) {
                $form->guardaInformacion();
            }
            App::getRouter()::redirect('/persona/list/');
            $this->data['form'] = $form->pintar();
            
        }
       public function list()
       {
           $this->data = ModelPersona::getAll();
       }
        

}//ControllerPersona

?>