<?php 

class BaseModel  
{
    protected $db;

    public function __construct() {
        $this->db = App::getDB();
    }
}//BaseModel


?>