<?php 

function startsWith($haystack, $needle)
{
    $lenght = strlen($needle);
    return (substr($haystack, 0, $lenght) === $needle);
}//startsWith

spl_autoload_register(function ($nombre_clase) {
    $ruta_a_clase = ROOT.DS."src".DS;
    // Si comienza por "Cotroller"
    //     /src/controller/<nombre>    
    if (startsWith($nombre_clase, "Controller")) {
        $ruta_a_clase .= "controller".DS.$nombre_clase;
    }
    // Si no  si comieza por Model
    //     /src/model<nombre>
    elseif (startsWith($nombre_clase, "Model")) {
        $ruta_a_clase .= "model".DS.$nombre_clase;
    }// Si no
    //     /src/<nombre>
    else{
        $ruta_a_clase .= $nombre_clase;
    }//else
    $ruta_a_clase .=".php";

    require($ruta_a_clase);

});

require(ROOT.DS."config".DS."config.php");
?>