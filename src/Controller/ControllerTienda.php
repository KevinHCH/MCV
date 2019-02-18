<?php 

class ControllerTienda extends BaseController 
{
    public function listaProductos()
    {
        $this->data = ModelTienda::getAll();
    }

    public function verPrenda($prenda)
    {
        $n = new ModelTienda();
        $this->data["prenda"] = $n->getByName($prenda);
        // $this->data["talla"] = ModelTienda::getBySize($talla);
    }
}


?>