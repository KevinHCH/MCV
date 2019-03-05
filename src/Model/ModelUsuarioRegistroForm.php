<?php 

class ModelUsuarioRegistroForm extends BaseForm
{
    protected static $lista_info = [
        'id',
        'nombre_usuario',
        'email',
        'pass'
    ];

    protected static $lista_tipo = [
        'FieldID',
        'FieldText',
        'FieldText',
        'FieldText'
    ];

    protected static $clase_modelo_asociado = 'ModelUsuario';
    
}//BaseForm

?>