<?php 

define('DS',DIRECTORY_SEPARATOR); // Permite que la app funcione en windows y linux

// sera la ruta actual de nuestro proyecto
define('ROOT',dirname(dirname(__FILE__))); //File = Fichero actual


echo "<pre>";
echo (__FILE__)."<br>";
echo dirname(__FILE__)."<br>";
echo dirname(dirname(__FILE__))."<br>";
echo "</pre>";

require(ROOT.DS."src".DS."init.php");

echo Config::get('site.name');
?>