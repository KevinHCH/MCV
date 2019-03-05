<?php
class ControllerUsuario extends BaseController {

    public function login()
    {
        $form = new ModelUsuarioLoginForm($_POST);
        if(count($_POST)>0){
            // Aquí debéis preguntar a los modelos
            // Yo siempre que me envíen algo lo pongo a true
            $usuario = $_POST['email'];
            $passPost = $_POST['pass'];
            
            $datosUsuario = ModelUsuario::getByName($usuario);
            
                if(!empty($datosUsuario)){
                $passH = $datosUsuario['pass'];
                
                    if(password_verify ($passPost, $passH)){
                        Session::getInstance()->set('AUTH', true);
                        App::getRouter()::redirect('/noticias/list/'); 
                    }
                }else{
                    App::getRouter()::redirect('/usuario/login/'); 
                } 
        }//login
            $this->data['form'] = $form->pintar();
    }
    public function registro()
    {
        $form = new ModelUsuarioRegistroForm($_POST);
        
        if(count($_POST)>0 && $form->datosValidos()) {
            $postTratado = $_POST;
            $contrasena = $postTratado['pass'];
            $contrasena = password_hash($contrasena,2);
            $postTratado['pass'] = $contrasena;
            
            $form = new ModelUsuarioRegistroForm($postTratado);
            
            $form->guardaInformacion();
            App::getRouter()::redirect('/noticias/list/');
        }
        
        $this->data['form'] = $form->pintar();
    }//registro

    public function salir()
    {
        Session::getInstance()->set('AUTH', false);
        App::getRouter()->redirect('/');
    }

}//ControllerUsuario
?>